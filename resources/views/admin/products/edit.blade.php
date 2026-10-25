<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Chewy Bakery Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { margin: 0; background-color: #FFF8F0; color: #4A2E1D; padding: 40px 20px; }
        .container { max-width: 700px; margin: 0 auto; }
        .form-card { background: #FFFFFF; border-radius: 16px; padding: 30px; border: 1px solid #E8D8C8; box-shadow: 0 4px 20px rgba(74,46,29,0.05); }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #4A2E1D; }
        input[type="text"], input[type="number"], textarea, input[type="file"] { 
            width: 100%; padding: 12px; border: 1.5px solid #E8D8C8; border-radius: 10px; background-color: #FFFDF9; font-size: 14px; color: #4A2E1D; 
        }
        textarea { resize: vertical; }
        .btn-back { color: #8C6D53; text-decoration: none; font-size: 14px; font-weight: 500; display: inline-block; margin-bottom: 15px; }
        .btn-back:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Kembali & Judul -->
        <div>
            <a href="{{ route('admin.products.index') }}" class="btn-back">← Kembali ke Daftar Produk</a>
            <h2 style="margin: 0 0 25px 0; font-weight: 700; color: #4A2E1D; font-family: serif; font-size: 26px;">Edit Produk: {{ $product->name ?? $product->nama_produk ?? 'Produk' }}</h2>
        </div>

        <!-- Validasi Error -->
        @if ($errors->any())
            <div style="background-color: #F8D7DA; color: #721C24; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                <ul style="margin: 0; padding-left: 15px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card Form Edit -->
        <div class="form-card">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Nama Produk -->
                <div class="form-group">
                    <label>Nama Roti / Produk</label>
                    <input type="text" name="name" value="{{ old('name', $product->name ?? $product->nama_produk ?? '') }}" required>
                </div>

                <!-- Harga Produk -->
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price ?? $product->harga ?? '') }}" required>
                </div>

                <!-- Deskripsi Produk -->
                <div class="form-group">
                    <label>Deskripsi Roti</label>
                    <textarea name="description" rows="4">{{ old('description', $product->description ?? $product->deskripsi ?? '') }}</textarea>
                </div>

                <!-- Foto Produk -->
                <div class="form-group">
                    <label>Foto Produk Saat Ini</label>
                    @if(isset($product->image) && $product->image)
                        <div style="margin-bottom: 12px;">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Foto Produk" style="width: 90px; height: 90px; object-fit: cover; border-radius: 10px; border: 1px solid #E8D8C8;">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*">
                    <small style="color: #8C6D53; font-size: 12px; display: block; margin-top: 6px;">*Kosongkan jika tidak ingin mengubah foto produk.</small>
                </div>

                <!-- Tombol Aksi -->
                <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 30px;">
                    <a href="{{ route('admin.products.index') }}" style="background-color: #EFECE6; color: #4A2E1D; padding: 12px 20px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 14px; display: inline-flex; align-items: center;">Batal</a>
                    <button type="submit" style="background-color: #6B4423; color: #FFF; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 600; font-size: 14px; cursor: pointer;">Perbarui Produk</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>