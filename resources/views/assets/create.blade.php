<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Asset</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #222;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button,
        .back {
            padding: 11px 18px;
            border-radius: 6px;
            border: none;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #e5e7eb;
            color: #111827;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Tambah Asset</h1>

        <p>Masukkan informasi asset baru.</p>

        <form method="POST" action="{{ route('assets.store') }}">

            @csrf

            <div class="form-group">
                <label>Kode Asset</label>

                <input
                    type="text"
                    name="asset_code"
                    value="{{ old('asset_code') }}"
                    placeholder="Contoh: LT-001"
                >

                @error('asset_code')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Nama Asset</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Laptop Admin"
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Brand</label>

                <input
                    type="text"
                    name="brand"
                    value="{{ old('brand') }}"
                    placeholder="Contoh: Lenovo"
                >

                @error('brand')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Model</label>

                <input
                    type="text"
                    name="model"
                    value="{{ old('model') }}"
                    placeholder="Contoh: ThinkPad E14"
                >
            </div>


            <div class="form-group">
                <label>Processor</label>

                <input
                    type="text"
                    name="processor"
                    value="{{ old('processor') }}"
                    placeholder="Contoh: Ryzen 5"
                >
            </div>


            <div class="form-group">
                <label>RAM</label>

                <input
                    type="text"
                    name="ram"
                    value="{{ old('ram') }}"
                    placeholder="Contoh: 16 GB"
                >
            </div>


            <div class="form-group">
                <label>Storage</label>

                <input
                    type="text"
                    name="storage"
                    value="{{ old('storage') }}"
                    placeholder="Contoh: 512 GB SSD"
                >
            </div>


            <div class="form-group">
                <label>Status</label>

                <select name="status">

                    <option value="Aktif"
                        {{ old('status', 'Aktif') === 'Aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="Rusak"
                        {{ old('status') === 'Rusak' ? 'selected' : '' }}>
                        Rusak
                    </option>

                    <option value="Maintenance"
                        {{ old('status') === 'Maintenance' ? 'selected' : '' }}>
                        Maintenance
                    </option>

                </select>
            </div>


            <div class="form-group">
                <label>Lokasi</label>

                <input
                    type="text"
                    name="location"
                    value="{{ old('location') }}"
                    placeholder="Contoh: Ruang Admin"
                >
            </div>


            <div class="buttons">

                <button type="submit">
                    Simpan Asset
                </button>

                <a href="{{ route('assets.index') }}" class="back">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>