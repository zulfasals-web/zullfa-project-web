@extends('layouts.admin')

@section('content')
    <div style="margin-bottom: 24px;">
        <h2 style="font-weight: 700; margin: 0; color: #4A2E1D;">Moderasi Ulasan Pelanggan</h2>
        <p style="color: #8C6D53; font-size: 14px; margin: 4px 0 0 0;">Pilih ulasan mana yang disetujui untuk ditampilkan di halaman depan web.</p>
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
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">ID / User ID</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Rating</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Ulasan / Komentar</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8;">Status Tampil</th>
                    <th style="padding: 14px 20px; font-weight: 600; border-bottom: 2px solid #E8D8C8; text-align: center;">Aksi Moderasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews ?? [] as $review)
                <tr style="border-bottom: 1px solid #F3ECE4;">
                    <td style="padding: 12px 20px; font-weight: 600; color: #4A2E1D;">
                        {{ optional($review->user)->name ?? 'Pelanggan (User ID: ' . $review->user_id . ')' }}
                    </td>
                    <td style="padding: 12px 20px; color: #E6A100; font-weight: 700;">
                        ⭐ {{ $review->rating }}/5
                    </td>
                    <td style="padding: 12px 20px; color: #555; max-width: 300px; word-break: break-word;">
                        {{ $review->komentar ?? $review->comment ?? '-' }}
                    </td>
                    <td style="padding: 12px 20px;">
                        @if($review->is_disetuju == 1)
                            <span style="background-color: #D4EDDA; color: #155724; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;">Disetujui</span>
                        @else
                            <span style="background-color: #FFF3CD; color: #856404; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;">Menunggu</span>
                        @endif
                    </td>
                    <td style="padding: 12px 20px; text-align: center;">
                        <form action="{{ route('admin.reviews.toggle', $review->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" style="background-color: #6B4423; color: #FFF; border: none; padding: 6px 14px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: background 0.2s;">
                                {{ $review->is_disetuju == 1 ? 'Sembunyikan' : 'Tampilkan di Web' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #8C6D53;">Belum ada ulasan dari pelanggan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection