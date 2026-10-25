<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru - Chewy Bakery Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { margin: 0; background-color: #FDFBF7; color: #4A2E1D; padding: 40px 20px; }
        .form-card { max-width: 600px; margin: 0 auto; background: #FFFFFF; border-radius: 16px; padding: 30px; border: 1px solid #E8D8C8; box-shadow: 0 4px 20px rgba(74,46,29,0.05); }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; }
        input[type="text"], input[type="number"], textarea, input[type="file"] { width: 100%; padding: 12px; border: 1.5px solid #E8D8C8; border-radius: 10px; background-color: #FFFDF9; font-size: 14px; }
    </style>
</head>
<body>

    <div class="form-card">
        <div style="margin-bottom: 20px;">
            <a href="{{ route('admin.products.index') }}" style="color: #8C6D53; text-decoration: none; font-size: 14px; font-weight: 500;">← Kembali ke Daftar Produk</a>
            <h2 style="margin: 10px 0 0 0; font-weight: 700;">Tambah Produk Roti Baru</h2>
        </div>

        @if ($errors->any())
            <div style="background-color: #F8D7DA; color: #721C24; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                <ul style="margin: 0; padding-left: 15px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>Nama Roti / Produk</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Almond Croissant">
            </div>

            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price') }}" required placeholder="Contoh: 25000">
            </div>

            <div class="form-group">
                <label>Deskripsi Roti</label>
                <textarea name="description" rows="4" placeholder="Jelaskan kelezatan atau bahan-bahan roti ini...">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Foto Produk</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 30px;">
                <a href="{{ route('admin.products.index') }}" style="background-color: #EFECE6; color: #4A2E1D; padding: 12px 20px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 14px;">Batal</a>
                <button type="submit" style="background-color: #6B4423; color: #FFF; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 600; font-size: 14px; cursor: pointer;">Simpan Produk</button>
            </div>
        </form>
    </div>

</body>
</html>