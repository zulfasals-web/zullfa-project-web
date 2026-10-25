<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BakingListController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\KuotaHarianController;

/*
|--------------------------------------------------------------------------
| Rute Dashboard & Pengarah Setelah Login
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();
    
    // Cek kolom 'peran'
    if ($user && ($user->peran === 'admin' || $user->is_admin == 1)) {
        return redirect()->route('admin.dashboard');
    }
    
    return redirect('/'); 
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Storefront (Pelanggan Public)
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/menu', [FrontController::class, 'menu'])->name('menu.index');
Route::get('/menu/{slug}', [FrontController::class, 'show'])->name('menu.show');

/*
|--------------------------------------------------------------------------
| Sistem Keranjang (Wajib Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    
    // Rute Clear Keranjang
    Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});

/*
|--------------------------------------------------------------------------
| Area Pelanggan (Perlu Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    
    // Halaman instruksi & upload bukti bayar
    Route::get('/pesanan/{id}/bayar', [CheckoutController::class, 'bayar'])->name('pesanan.bayar');
    Route::post('/pesanan/{id}/bayar', [CheckoutController::class, 'prosesBayar'])->name('pesanan.proses-bayar');

    Route::get('/account/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/account/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    
    // Rute Kirim Ulasan Pelanggan (Disesuaikan dengan ID Pesanan)
    Route::post('/account/orders/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

/*
|--------------------------------------------------------------------------
| Area Admin Dapur (Perlu Auth & Akses Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dasbor Utama Admin (Ringkasan Statistik, Produk, Pesanan Terbaru)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Baking List / Panel Dapur
    Route::get('/baking-list', [BakingListController::class, 'index'])->name('baking-list.index');

    // Manajemen Kuota Harian Dapur
    Route::get('/kuota', [KuotaHarianController::class, 'index'])->name('kuota.index');
    Route::post('/kuota', [KuotaHarianController::class, 'store'])->name('kuota.store');
    Route::patch('/kuota/{id}', [KuotaHarianController::class, 'update'])->name('kuota.update');

    // Kelola Produk Roti & Pesanan
    Route::resource('products', AdminProductController::class);
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);
    
    // Moderasi Ulasan
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::patch('/reviews/{id}/toggle', [AdminReviewController::class, 'toggle'])->name('reviews.toggle');
});

require __DIR__.'/auth.php';