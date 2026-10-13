<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan | FINDIT</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f8ff;
            color: #193253;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 7%;
            background: white;
            border-bottom: 1px solid #e5edf8;
        }

        .logo {
            color: #2878e5;
            font-size: 27px;
            font-weight: 800;
            text-decoration: none;
        }

        .header-link {
            color: #2878e5;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }

        main {
            width: min(760px, 92%);
            margin: 38px auto;
        }

        .intro { margin-bottom: 24px; }

        .intro h1 {
            margin: 0 0 10px;
            font-size: clamp(25px, 4vw, 32px);
        }

        .intro p {
            margin: 0;
            color: #718096;
            line-height: 1.6;
        }

        .card {
            padding: clamp(20px, 4vw, 34px);
            background: white;
            border: 1px solid #e1eafa;
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(40, 80, 140, .07);
        }

        .success {
            margin-bottom: 20px;
            padding: 14px;
            border-radius: 10px;
            background: #e7f8ed;
            color: #176534;
        }

        .error-box {
            margin-bottom: 20px;
            padding: 14px;
            border-radius: 10px;
            background: #fff0f0;
            color: #b42318;
        }

        .type-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin: 12px 0 24px;
        }

        .type-option {
            position: relative;
        }

        .type-option input {
            position: absolute;
            opacity: 0;
        }

        .type-option label {
            display: block;
            padding: 17px;
            border: 1px solid #dce6f4;
            border-radius: 12px;
            cursor: pointer;
            text-align: center;
            line-height: 1.7;
        }

        .type-option input:checked + label {
            border-color: #2878e5;
            background: #edf5ff;
            color: #1f65c1;
            box-shadow: inset 0 0 0 1px #2878e5;
        }

        .type-option input:focus-visible + label {
            outline: 3px solid #a8ceff;
        }

        .field { margin-bottom: 20px; }

        .field label {
            display: block;
            margin-bottom: 9px;
            font-size: 14px;
            font-weight: 700;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"],
        select,
        textarea {
            display: block;
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d7e2f0;
            border-radius: 10px;
            background: white;
            color: #193253;
            font: inherit;
            outline: none;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
            line-height: 1.6;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #2878e5;
            box-shadow: 0 0 0 3px #e8f1ff;
        }

        .hint {
            margin-top: 7px;
            color: #7b899d;
            font-size: 12px;
            line-height: 1.5;
        }

        .error {
            margin-top: 7px;
            color: #c62828;
            font-size: 13px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            min-height: 48px;
            padding: 13px 18px;
            border: 0;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #2878e5;
            color: white;
        }

        .btn-primary:hover { background: #1765cd; }

        .btn-secondary {
            border: 1px solid #dce6f4;
            background: white;
            color: #415875;
        }

        footer {
            padding: 24px;
            text-align: center;
            color: #8190a5;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            header { padding: 16px 5%; }
            main { margin: 25px auto; }
            .type-options { grid-template-columns: 1fr; }
            .actions { flex-direction: column; }
        }
    </style>
</head>

<body>
    <header>
        <a class="logo" href="{{ route('home') }}">FINDIT</a>
        <a class="header-link" href="{{ route('home') }}">← Kembali ke Beranda</a>
    </header>

    <main>
        <section class="intro">
            <h1>Buat Laporan Barang</h1>
            <p>
                Bantu civitas akademika menemukan barang yang hilang
                atau mengembalikan barang yang ditemukan di lingkungan kampus.
            </p>
        </section>

        <section class="card">
            @if (session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="error-box">
                    <strong>Periksa kembali data laporanmu:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reports.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label>Jenis laporan *</label>

                    <div class="type-options">
                        <div class="type-option">
                            <input
                                type="radio"
                                id="lost"
                                name="report_type"
                                value="lost"
                                {{ old('report_type', 'lost') === 'lost' ? 'checked' : '' }}
                                required
                            >
                            <label for="lost">
                                🔎<br>
                                <strong>Barang Hilang</strong><br>
                                <small>Saya kehilangan barang</small>
                            </label>
                        </div>

                        <div class="type-option">
                            <input
                                type="radio"
                                id="found"
                                name="report_type"
                                value="found"
                                {{ old('report_type') === 'found' ? 'checked' : '' }}
                                required
                            >
                            <label for="found">
                                🎒<br>
                                <strong>Barang Ditemukan</strong><br>
                                <small>Saya menemukan barang</small>
                            </label>
                        </div>
                    </div>

                    @error('report_type')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="item_name">Nama barang *</label>
                    <input
                        id="item_name"
                        type="text"
                        name="item_name"
                        value="{{ old('item_name') }}"
                        placeholder="Contoh: Dompet hitam"
                        maxlength="255"
                        required
                    >
                    @error('item_name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="category">Kategori barang *</label>
                    <select id="category" name="category" required>
                        <option value="">Pilih kategori</option>
                        @foreach ([
                            'Elektronik',
                            'Dompet dan Uang',
                            'Kartu Identitas',
                            'Kunci',
                            'Tas',
                            'Buku dan Alat Tulis',
                            'Pakaian dan Aksesori',
                            'Lainnya'
                        ] as $category)
                            <option
                                value="{{ $category }}"
                                {{ old('category') === $category ? 'selected' : '' }}
                            >
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="location">Lokasi kejadian *</label>
                    <input
                        id="location"
                        type="text"
                        name="location"
                        value="{{ old('location') }}"
                        placeholder="Contoh: Perpustakaan kampus"
                        maxlength="255"
                        required
                    >
                    @error('location')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="event_date">Tanggal kejadian *</label>
                    <input
                        id="event_date"
                        type="date"
                        name="event_date"
                        value="{{ old('event_date') }}"
                        max="{{ date('Y-m-d') }}"
                        required
                    >
                    <div class="hint">
                        Pilih tanggal saat barang hilang atau ditemukan.
                    </div>
                    @error('event_date')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label for="description">Deskripsi barang *</label>
                    <textarea
                        id="description"
                        name="description"
                        maxlength="5000"
                        placeholder="Jelaskan warna, ciri khusus, merek, atau informasi lain yang membantu identifikasi barang."
                        required
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field" id="whatsappField" hidden>
                    <label for="whatsapp">Nomor WhatsApp *</label>
                    <input id="whatsapp" type="tel" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="Contoh: 081234567890" maxlength="20" pattern="[0-9+\-\s()]{8,20}">
                    <div class="hint">Nomor ini akan ditampilkan pada laporan barang temuan agar pemilik dapat menghubungimu. Isi nomor aktif dan setujui persetujuan di bawah.</div>
                    <label style="display:flex;gap:8px;align-items:flex-start;margin-top:12px;font-weight:400;">
                        <input type="checkbox" id="whatsappConsent" name="whatsapp_consent" value="1" {{ old('whatsapp_consent') ? 'checked' : '' }} style="margin-top:4px;">
                        Saya setuju nomor WhatsApp saya ditampilkan pada laporan barang temuan.
                    </label>
                    @error('whatsapp')<div class="error">{{ $message }}</div>@enderror
                    @error('whatsapp_consent')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div class="actions">
                    <a class="btn btn-secondary" href="{{ route('home') }}">
                        Batal
                    </a>
                    <button class="btn btn-primary" type="submit">
                        Kirim Laporan
                    </button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        FINDIT — Lost something? Let's FINDIT.
    </footer>
<script>
    const lostRadio = document.getElementById('lost');
    const foundRadio = document.getElementById('found');
    const whatsappField = document.getElementById('whatsappField');
    const whatsappInput = document.getElementById('whatsapp');
    const whatsappConsent = document.getElementById('whatsappConsent');
    function toggleWhatsappField() {
        const isFound = foundRadio.checked;
        whatsappField.hidden = !isFound;
        whatsappInput.required = isFound;
        whatsappConsent.required = isFound;
        if (!isFound) whatsappConsent.checked = false;
    }
    lostRadio.addEventListener('change', toggleWhatsappField);
    foundRadio.addEventListener('change', toggleWhatsappField);
    toggleWhatsappField();
</script>
</body>
</html>
