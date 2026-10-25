<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
{
    $cart = session()->get('cart', []);
    return view('storefront.cart', compact('cart'));
}

    public function add(Request $request, $id)
    {
        $product = Produk::findOrFail($id);
        $cart = session()->get('cart', []);

        $quantity = $request->input('quantity', 1);

        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        if (isset($cart[$id])) {
            $cart[$id]['jumlah'] += $quantity;
            $cart[$id]['quantity'] += $quantity;
        } else {
            // Jika belum ada, masukkan data produk baru ke session
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name ?? $product->nama_produk,
                "nama_produk" => $product->name ?? $product->nama_produk,
                "jumlah" => $quantity,
                "quantity" => $quantity,
                "harga" => $product->price ?? $product->harga,
                "price" => $product->price ?? $product->harga,
                "image" => $product->image ?? null
            ];
        }

        session()->put('cart', $cart);

        // Wajib ada return supaya tidak blank / layar putih & langsung mengarah ke halaman checkout/keranjang
        return redirect()->route('cart.index')->with('success', 'Roti berhasil ditambahkan ke keranjang!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Keranjang berhasil dikosongkan!');
    }
}