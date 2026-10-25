<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class FrontController extends Controller
{
    // Halaman Landing Page
    public function index()
    {
        $produks = Produk::take(6)->get();
        return view('storefront.index', compact('produks'));
    }

    // Halaman Katalog Menu Utama
    public function menu()
    {
        $produks = Produk::all();
        return view('storefront.menu.index', compact('produks'));
    }

    // Halaman Detail Roti
    public function show($slug)
    {
        // Mencari produk berdasarkan slug atau id
        $produk = Produk::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
        return view('storefront.menu.show', compact('produk'));
    }
}