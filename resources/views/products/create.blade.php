<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk | MiniMarket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        :root {
            color-scheme: dark;
            --background: #080a12;
            --surface: rgba(18, 21, 34, .9);
            --border: rgba(255, 255, 255, .09);
            --text: #f4f3fb;
            --muted: #999aaf;
            --violet: #a78bfa;
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            padding: 28px 16px;
            color: var(--text);
            background:
                radial-gradient(ellipse at 78% 5%, rgba(111, 82, 208, .18), transparent 28rem),
                var(--background);
            font-family: 'DM Sans', sans-serif;
        }

        a { color: inherit; text-decoration: none; }
        .page { width: min(760px, 100%); margin: 0 auto; }
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 14px; margin-bottom: 24px; }
        .brand { display: inline-flex; align-items: center; gap: 10px; font-family: Manrope, sans-serif; font-weight: 800; }
        .brand-icon { display: grid; width: 42px; height: 42px; place-items: center; border: 1px solid rgba(255,255,255,.16); border-radius: 14px; color: #10131d; background: linear-gradient(145deg, #a5f3fc, #a78bfa 78%); }
        .button { display: inline-flex; min-height: 40px; align-items: center; justify-content: center; gap: 8px; padding: 0 13px; border: 1px solid var(--border); border-radius: 12px; color: #dedbeb; background: rgba(255,255,255,.04); font-size: .8rem; font-weight: 700; }
        .button:hover { color: #fff; background: rgba(255,255,255,.09); }
        .form-card { padding: clamp(22px, 5vw, 38px); border: 1px solid var(--border); border-radius: 24px; background: var(--surface); box-shadow: 0 24px 70px rgba(0,0,0,.28); }
        .eyebrow { margin: 0 0 9px; color: #c4b5fd; font-size: .7rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
        h1 { margin: 0 0 8px; font-family: Manrope, sans-serif; font-size: clamp(1.6rem, 5vw, 2.1rem); font-weight: 800; letter-spacing: -.05em; }
        .intro { margin: 0 0 27px; color: var(--muted); font-size: .88rem; line-height: 1.6; }
        .field { margin-bottom: 19px; }
        label { display: block; margin-bottom: 7px; color: #dedbea; font-size: .8rem; font-weight: 700; }
        .required { color: #fb7185; }
        input, textarea { display: block; width: 100%; min-height: 46px; padding: 11px 13px; border: 1px solid var(--border); border-radius: 12px; outline: none; color: var(--text); background: rgba(255,255,255,.045); font: inherit; font-size: .86rem; }
        input[type="file"] { min-height: auto; padding: 9px; }
        input[type="file"]::file-selector-button { margin-right: 10px; padding: 8px 11px; border: 0; border-radius: 8px; color: #171522; background: linear-gradient(100deg, #a5f3fc, #bca6ff); font: inherit; font-size: .78rem; font-weight: 700; cursor: pointer; }
        textarea { min-height: 112px; resize: vertical; }
        input:focus, textarea:focus { border-color: rgba(167,139,250,.7); box-shadow: 0 0 0 4px rgba(167,139,250,.1); }
        input::placeholder, textarea::placeholder { color: #77788d; }
        .help { margin: 6px 0 0; color: #85869a; font-size: .71rem; }
        .error { margin: 6px 0 0; color: #fda4af; font-size: .75rem; }
        .invalid { border-color: rgba(251,113,133,.7); }
        .image-preview { display: none; width: min(100%, 300px); max-height: 220px; margin-top: 13px; border: 1px solid var(--border); border-radius: 14px; object-fit: cover; }
        .actions { display: flex; justify-content: flex-end; gap: 10px; margin-top: 28px; }
        .submit { min-height: 45px; padding: 0 17px; border: 0; border-radius: 12px; color: #11131c; background: linear-gradient(100deg, #a5f3fc, #bca6ff); font: inherit; font-size: .83rem; font-weight: 800; cursor: pointer; }
        .submit:hover { filter: brightness(1.06); }
        @media (max-width: 480px) {
            body { padding: 18px 13px; }
            .form-card { border-radius: 19px; }
            .actions { flex-direction: column-reverse; }
            .actions > * { width: 100%; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
</head>

<body>
    <main class="page">
        <header class="topbar">
            <a class="brand" href="{{ route('products.index') }}">
                <span class="brand-icon"><i class="bi bi-basket2-fill"></i></span>
                <span>MiniMarket</span>
            </a>
            <a class="button" href="{{ route('products.index') }}"><i class="bi bi-arrow-left"></i> Kembali ke produk</a>
        </header>

        <section class="form-card" aria-labelledby="form-title">
            <p class="eyebrow">Katalog produk</p>
            <h1 id="form-title">Tambah produk baru</h1>
            <p class="intro">Isi informasi barang untuk menambahkannya ke katalog MiniMarket.</p>

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="field">
                    <label for="nama">Nama produk <span class="required">*</span></label>
                    <input id="nama" name="nama" type="text" value="{{ old('nama') }}" maxlength="255" required autofocus class="@error('nama') invalid @enderror" placeholder="Contoh: Beras Premium 5 kg" aria-describedby="nama-error">
                    @error('nama')
                        <p class="error" id="nama-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="harga">Harga (Rp) <span class="required">*</span></label>
                    <input id="harga" name="harga" type="number" value="{{ old('harga') }}" min="0" step="1" required class="@error('harga') invalid @enderror" placeholder="Contoh: 75000" aria-describedby="harga-error">
                    @error('harga')
                        <p class="error" id="harga-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="stok">Jumlah stok <span class="required">*</span></label>
                    <input id="stok" name="stok" type="number" value="{{ old('stok') }}" min="0" step="1" required class="@error('stok') invalid @enderror" placeholder="Contoh: 25" aria-describedby="stok-error">
                    @error('stok')
                        <p class="error" id="stok-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="@error('deskripsi') invalid @enderror" placeholder="Informasi singkat tentang produk" aria-describedby="deskripsi-error">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="error" id="deskripsi-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="gambar">Gambar produk</label>
                    <input id="gambar" name="gambar" type="file" accept="image/jpeg,image/png,image/webp" class="@error('gambar') invalid @enderror" aria-describedby="gambar-help gambar-error">
                    <p class="help" id="gambar-help">Format JPG, PNG, atau WebP. Maksimal 2 MB.</p>
                    @error('gambar')
                        <p class="error" id="gambar-error">{{ $message }}</p>
                    @enderror
                    <img class="image-preview" id="image-preview" alt="Pratinjau gambar produk">
                </div>

                <div class="actions">
                    <a class="button" href="{{ route('products.index') }}">Batal</a>
                    <button class="submit" type="submit"><i class="bi bi-plus-lg"></i> Simpan produk</button>
                </div>
            </form>
        </section>
    </main>
    <script>
        const imageInput = document.getElementById('gambar');
        const imagePreview = document.getElementById('image-preview');
        let previewUrl;

        imageInput.addEventListener('change', () => {
            if (previewUrl) URL.revokeObjectURL(previewUrl);

            const [file] = imageInput.files;
            if (!file) {
                imagePreview.removeAttribute('src');
                imagePreview.style.display = 'none';
                return;
            }

            previewUrl = URL.createObjectURL(file);
            imagePreview.src = previewUrl;
            imagePreview.style.display = 'block';
        });
    </script>
</body>

</html>
