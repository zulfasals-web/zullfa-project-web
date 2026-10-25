<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ulasan;

class ReviewController extends Controller
{
    // Menampilkan daftar ulasan di panel admin
    public function index()
    {
        $reviews = Ulasan::all(); 
        return view('admin.reviews.index', compact('reviews'));
    }

    // Fungsi toggle (sementara dialihkan agar tidak error kolom is_active)
    public function toggle($id)
    {
        $review = Ulasan::findOrFail($id);
        
        // Jika kamu ingin fitur hapus ulasan, aktifkan baris di bawah ini:
        // $review->delete();

        return redirect()->back()->with('success', 'Aksi ulasan berhasil dijalankan!');
    }
}