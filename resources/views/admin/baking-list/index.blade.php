@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 24px;">
        <h2 style="font-weight: 700; margin: 0; color: #4A2E1D;">👨‍🍳 Baking List / Panel Dapur</h2>
        <p style="color: #8C6D53; font-size: 14px; margin: 4px 0 0 0;">Daftar ringkasan roti yang harus dipanggang berdasarkan pesanan pre-order aktif.</p>
    </div>

    @if(session('success'))
        <div style="background-color: #D4EDDA; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02); padding: 20px;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
            <thead>
                <tr style="background-color: #F7EBE1; color: #4A2E1D;">
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Nama Produk Roti</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8; text-align: center;">Total Dipanggang (Pcs)</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8; text-align: center;">Status Dapur</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bakingList ?? [] as $item)
                <tr style="border-bottom: 1px solid #F3ECE4;">
                    <td style="padding: 12px 20px; font-weight: 600; color: #4A2E1D;">
                        {{ $item->nama_produk ?? 'Roti Chewy' }}
                    </td>
                    <td style="padding: 12px 20px; text-align: center; font-weight: 700; color: #6B4423; font-size: 16px;">
                        {{ $item->total_pcs ?? 0 }} Pcs
                    </td>
                    <td style="padding: 12px 20px; text-align: center;">
                        <span style="background-color: #FFF3CD; color: #856404; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;">
                            Siap Dipanggang
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center; padding: 40px; color: #8C6D53;">Tidak ada antrean memanggang roti untuk hari ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection