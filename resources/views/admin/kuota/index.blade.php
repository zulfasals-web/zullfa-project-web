@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 24px;">
        <h2 style="font-weight: 700; margin: 0; color: #4A2E1D;">📅 Manajemen Kuota Harian Dapur</h2>
        <p style="color: #8C6D53; font-size: 14px; margin: 4px 0 0 0;">Atur batas maksimal pesanan roti per tanggal pengambilan.</p>
    </div>

    @if(session('success'))
        <div style="background-color: #D4EDDA; color: #155724; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Atur Kuota Baru -->
    <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <h3 style="font-size: 16px; font-weight: 700; color: #4A2E1D; margin-bottom: 16px;">Atur Kuota Baru</h3>
        <form action="{{ route('admin.kuota.store') }}" method="POST" style="display: flex; gap: 16px; align-items: flex-end; flex-wrap: wrap;">
            @csrf
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #4A2E1D; margin-bottom: 6px;">Tanggal Pengambilan</label>
                <input type="date" name="tanggal" required style="padding: 10px 14px; border: 1px solid #E8D8C8; border-radius: 8px; font-size: 14px; color: #4A2E1D; outline: none;">
            </div>
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #4A2E1D; margin-bottom: 6px;">Batas Maksimal Kuota (Pcs)</label>
                <input type="number" name="kuota_maksimal" placeholder="Contoh: 50" required min="1" style="padding: 10px 14px; border: 1px solid #E8D8C8; border-radius: 8px; font-size: 14px; color: #4A2E1D; outline: none; width: 200px;">
            </div>
            <button type="submit" style="background-color: #6B4423; color: #FFF; border: none; padding: 11px 20px; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer;">
                Simpan Kuota
            </button>
        </form>
    </div>

    <!-- Tabel Daftar Kuota -->
    <div style="background: #FFFDF9; border-radius: 12px; border: 1px solid #E8D8C8; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
            <thead>
                <tr style="background-color: #F7EBE1; color: #4A2E1D;">
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Tanggal</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Kuota Maksimal</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Terpakai</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Sisa Kuota</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8; text-align: center;">Status Operasional</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kuotas ?? [] as $kuota)
                <tr style="border-bottom: 1px solid #F3ECE4;">
                    <td style="padding: 12px 20px; font-weight: 600; color: #4A2E1D;">
                        {{ \Carbon\Carbon::parse($kuota->tanggal)->translatedFormat('d F Y') }}
                    </td>
                    <td style="padding: 12px 20px; color: #6B4423; font-weight: 600;">
                        {{ $kuota->kuota_maksimal }} Pcs
                    </td>
                    <td style="padding: 12px 20px; color: #D9822B; font-weight: 600;">
                        {{ $kuota->terpakai ?? 0 }} Pcs
                    </td>
                    <td style="padding: 12px 20px; color: #2E7D32; font-weight: 600;">
                        {{ max(0, $kuota->kuota_maksimal - ($kuota->terpakai ?? 0)) }} Pcs
                    </td>
                    <td style="padding: 12px 20px; text-align: center;">
                        @if(($kuota->terpakai ?? 0) >= $kuota->kuota_maksimal)
                            <span style="background-color: #F8D7DA; color: #721C24; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;">Penuh</span>
                        @else
                            <span style="background-color: #D4EDDA; color: #155724; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;">Menerima Pesanan</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #8C6D53;">Belum ada pengaturan kuota harian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection