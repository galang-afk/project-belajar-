# Asset Dashboard

Internal Asset Dashboard berbasis Laravel untuk mengelola data aset perusahaan seperti laptop dan perangkat lainnya.

Project ini dibuat sebagai project pembelajaran sekaligus implementasi sistem CRUD dengan fitur autentikasi, pencarian, dan filter data.

## 🚀 Fitur

- 🔐 Login dan Logout
- 📊 Dashboard statistik asset
- ➕ Tambah asset
- 👁️ Melihat detail asset
- ✏️ Edit asset
- 🗑️ Hapus asset
- 🔎 Pencarian asset
- 🔽 Filter berdasarkan status
- 📋 Menampilkan data asset dalam bentuk tabel

## 🛠️ Teknologi

- Laravel 13
- PHP 8.5
- MySQL
- Blade
- Laravel Fortify
- HTML & CSS
- Git & GitHub
- Laragon

## 📦 Data Asset

Setiap asset memiliki informasi:

- Asset Code
- Nama Asset
- Brand
- Model
- Processor
- RAM
- Storage
- Status
- Location

### Status Asset

Terdapat 3 status asset:

- `Aktif`
- `Rusak`
- `Maintenance`

## 🏗️ Struktur Project

Project menggunakan konsep MVC (Model-View-Controller).

```text
app/
├── Http/
│   └── Controllers/
│       └── AssetController.php
│
└── Models/
    └── Asset.php

database/
└── migrations/
    └── create_assets_table.php

resources/
└── views/
    └── assets/
        ├── index.blade.php
        ├── create.blade.php
        ├── edit.blade.php
        └── show.blade.php

routes/
└── web.php
