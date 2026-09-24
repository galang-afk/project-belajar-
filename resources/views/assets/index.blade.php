<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asset Dashboard</title>

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
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }
        .stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-bottom: 20px;
        }
        @media (max-width: 768px) {
        .stats {
            grid-template-columns: repeat(2, 1fr);
             }
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .stat-title {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
        }
        
        .filter-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .filter-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        input,
        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        input {
            flex: 1;
            min-width: 220px;
        }

        .btn-search {
            background: #111827;
            color: white;
        }

        .btn-reset {
            background: #e5e7eb;
            color: #111827;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .table-box {
            background: white;
            border-radius: 10px;
            overflow-x: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f9fafb;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-aktif {
            background: #dcfce7;
            color: #166534;
        }

        .status-rusak {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-maintenance {
            background: #fef3c7;
            color: #92400e;
        }

        .action {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .action a {
            text-decoration: none;
        }

        .detail {
            color: #2563eb;
        }

        .edit {
            color: #ca8a04;
        }

        .delete-btn {
            border: none;
            background: none;
            color: #dc2626;
            cursor: pointer;
            padding: 0;
            font-size: 14px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        }

        .account {
            text-decoration: none;
            color: #374151;
            font-weight: 600;
        }

        .header-actions form {
            margin: 0;
        }

        .btn-logout {
            background: #ef4444;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-logout:hover {
            background: #dc2626;
        }
    </style>
</head>

<body>

<div class="container">

    {{-- Header --}}
    <div class="header">
        <div>
            <h1>Asset Dashboard</h1>
            <p>Kelola data asset perusahaan</p>
        </div>

        <div class="header-actions">
            <a href="#" class="account">
                👤 {{ auth()->user()->name }}
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-logout">
                    Logout
                </button>
            </form>

            <a href="{{ route('assets.create') }}" class="btn btn-primary">
                + Tambah Asset
            </a>
        </div>
    </div>


    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif


    {{-- Statistik Asset --}}
    <div class="stats">

        <div class="stat-card">
            <div class="stat-title">Total Asset</div>
            <div class="stat-number">
                {{ $totalAssets }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Aktif</div>
            <div class="stat-number">
                {{ $totalAktif }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Maintenance</div>
            <div class="stat-number">
                {{ $totalMaintenance }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Rusak</div>
            <div class="stat-number">
                {{ $totalRusak }}
            </div>
        </div>

    </div>


    {{-- Tabel --}}
    <div class="table-box">

        <table>

            <thead>
                <tr>
                    <th>Kode Asset</th>
                    <th>Nama</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Status</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($assets as $asset)

                    <tr>

                        <td>
                            {{ $asset->asset_code }}
                        </td>

                        <td>
                            {{ $asset->name }}
                        </td>

                        <td>
                            {{ $asset->brand }}
                        </td>

                        <td>
                            {{ $asset->model ?? '-' }}
                        </td>

                        <td>

                            @if ($asset->status === 'Aktif')

                                <span class="status status-aktif">
                                    Aktif
                                </span>

                            @elseif ($asset->status === 'Rusak')

                                <span class="status status-rusak">
                                    Rusak
                                </span>

                            @else

                                <span class="status status-maintenance">
                                    Maintenance
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $asset->location ?? '-' }}
                        </td>

                        <td>

                            <div class="action">

                                <a
                                    href="{{ route('assets.show', $asset) }}"
                                    class="detail">
                                    Detail
                                </a>

                                <a
                                    href="{{ route('assets.edit', $asset) }}"
                                    class="edit">
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('assets.destroy', $asset) }}"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-btn"
                                        onclick="return confirm('Yakin ingin menghapus asset ini?')"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="empty">
                            Belum ada data asset.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>