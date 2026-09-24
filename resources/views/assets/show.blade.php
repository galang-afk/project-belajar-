<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Asset</title>

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
            margin-bottom: 25px;
        }

        .row {
            display: flex;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }

        .label {
            width: 180px;
            font-weight: bold;
        }

        .value {
            flex: 1;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .aktif {
            background: #dcfce7;
            color: #166534;
        }

        .rusak {
            background: #fee2e2;
            color: #991b1b;
        }

        .maintenance {
            background: #fef3c7;
            color: #92400e;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        .back {
            background: #e5e7eb;
            color: #111827;
        }

        .edit {
            background: #2563eb;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Detail Asset</h1>

        <div class="row">
            <div class="label">Kode Asset</div>
            <div class="value">
                {{ $asset->asset_code }}
            </div>
        </div>

        <div class="row">
            <div class="label">Nama Asset</div>
            <div class="value">
                {{ $asset->name }}
            </div>
        </div>

        <div class="row">
            <div class="label">Brand</div>
            <div class="value">
                {{ $asset->brand }}
            </div>
        </div>

        <div class="row">
            <div class="label">Model</div>
            <div class="value">
                {{ $asset->model ?? '-' }}
            </div>
        </div>

        <div class="row">
            <div class="label">Processor</div>
            <div class="value">
                {{ $asset->processor ?? '-' }}
            </div>
        </div>

        <div class="row">
            <div class="label">RAM</div>
            <div class="value">
                {{ $asset->ram ?? '-' }}
            </div>
        </div>

        <div class="row">
            <div class="label">Storage</div>
            <div class="value">
                {{ $asset->storage ?? '-' }}
            </div>
        </div>

        <div class="row">
            <div class="label">Status</div>
            <div class="value">

                @if ($asset->status === 'Aktif')

                    <span class="status aktif">
                        Aktif
                    </span>

                @elseif ($asset->status === 'Rusak')

                    <span class="status rusak">
                        Rusak
                    </span>

                @else

                    <span class="status maintenance">
                        Maintenance
                    </span>

                @endif

            </div>
        </div>

        <div class="row">
            <div class="label">Lokasi</div>
            <div class="value">
                {{ $asset->location ?? '-' }}
            </div>
        </div>

        <div class="row">
            <div class="label">Dibuat</div>
            <div class="value">
                {{ $asset->created_at->format('d M Y H:i') }}
            </div>
        </div>

        <div class="row">
            <div class="label">Terakhir Diubah</div>
            <div class="value">
                {{ $asset->updated_at->format('d M Y H:i') }}
            </div>
        </div>

        <div class="buttons">

            <a
                href="{{ route('assets.index') }}"
                class="btn back"
            >
                ← Kembali
            </a>

            <a
                href="{{ route('assets.edit', $asset) }}"
                class="btn edit"
            >
                Edit Asset
            </a>

        </div>

    </div>

</div>

</body>
</html>