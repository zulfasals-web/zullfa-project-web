@extends('layouts.admin')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h2 style="font-weight: 700; margin: 0; color: #4A2E1D;">🥖 Kelola Katalog Produk Roti</h2>
            <p style="color: #8C6D53; font-size: 14px; margin: 4px 0 0 0;">Tambah, ubah, atau atur ketersediaan menu roti Chewy Bakery.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" style="background-color: #6B4423; color: #FFF; padding: 10px 18px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">
            + Tambah Produk Roti
        </a>
    </div>

    @if(session('success'))
        <div style="background-color: #D4EDDA; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
            <thead>
                <tr style="background-color: #F7EBE1; color: #4A2E1D;">
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Produk</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Harga</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Stok / Batas</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products ?? [] as $product)
                <tr style="border-bottom: 1px solid #F3ECE4;">
                    <td style="padding: 12px 20px; font-weight: 600; color: #4A2E1D;">
                        {{ $product->nama_produk ?? $product->name ?? 'Produk' }}
                    </td>
                    <td style="padding: 12px 20px; color: #6B4423; font-weight: 600;">
                        Rp {{ number_format($product->harga ?? $product->price ?? 0, 0, ',', '.') }}
                    </td>
                    <td style="padding: 12px 20px; color: #555;">
                        {{ $product->stok ?? $product->stock ?? 'Tersedia' }}
                    </td>
                    <td style="padding: 12px 20px; text-align: center;">
                        <a href="{{ route('admin.products.edit', $product->id) }}" style="color: #6B4423; font-weight: 600; text-decoration: none; margin-right: 12px;">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #A63A3A; font-weight: 600; cursor: pointer; font-size: 14px;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 40px; color: #8C6D53;">Belum ada produk roti yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection