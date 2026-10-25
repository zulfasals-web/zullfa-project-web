<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
public function destroy($id)
{
    // Cari data produk berdasarkan ID
    $product = Produk::findOrFail($id);

    // Hapus foto produk dari folder storage jika ada
    if ($product->image && Storage::exists('public/' . $product->image)) {
        Storage::delete('public/' . $product->image);
    }

    // Hapus data produk dari database
    $product->delete();

    // Redirect kembali ke halaman daftar produk dengan pesan sukses
    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
}
    // Menampilkan daftar produk
    public function index()
    {
        $products = Produk::all();
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan halaman form tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Produk::create([
            'kategori_id' => 1,
            'nama_produk' => $request->name,
            'slug'        => Str::slug($request->name),
            'harga'       => $request->price,
            'deskripsi'   => $request->description,
            'gambar'      => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk roti berhasil ditambahkan!');
    }

    // Menampilkan halaman form edit produk
    public function edit($id)
    {
        $product = Produk::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        $product = Produk::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $product->gambar;

        if ($request->hasFile('image')) {
            if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
                Storage::disk('public')->delete($product->gambar);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'nama_produk' => $request->name,
            'slug'        => Str::slug($request->name),
            'harga'       => $request->price,
            'deskripsi'   => $request->description,
            'gambar'      => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk roti berhasil diperbarui!');
    }
}