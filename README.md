\# 💻 Asset Dashboard

**Asset Dashboard** adalah aplikasi internal untuk mengelola dan memantau data aset perusahaan seperti laptop dan perangkat lainnya.

Project ini dibuat menggunakan **Laravel + MySQL** sebagai implementasi pembelajaran web development dengan konsep **MVC, CRUD, Authentication, Search, dan Filtering**.

---

## ✨ Features

- 🔐 Login & Logout
- 📊 Dashboard statistik aset
- ➕ Tambah aset
- 👁️ Lihat detail aset
- ✏️ Edit aset
- 🗑️ Hapus aset
- 🔎 Search / pencarian aset
- 🔽 Filter aset berdasarkan status
- 📋 Tabel daftar aset
- ✅ Validasi form
- 🔒 Authentication menggunakan Laravel

---

## 🛠️ Tech Stack

| Technology | Version / Description |
|---|---|
| PHP | 8.5 |
| Laravel | 13 |
| MySQL | Database |
| Blade | Template Engine |
| Laravel Fortify | Authentication |
| HTML | Structure |
| CSS | Styling |
| Git | Version Control |
| GitHub | Repository |
| Laragon | Local Development Environment |

---

## 📋 Asset Data

Setiap aset memiliki beberapa informasi:

- Asset Code
- Name
- Brand
- Model
- Processor
- RAM
- Storage
- Status
- Location

### Asset Status

Aplikasi memiliki 3 status aset:

- 🟢 **Aktif**
- 🔴 **Rusak**
- 🟡 **Maintenance**

---

## 📊 Dashboard

Dashboard menampilkan beberapa informasi utama:

- **Total Asset**
- **Asset Aktif**
- **Asset Maintenance**
- **Asset Rusak**

Selain statistik, dashboard juga menyediakan fitur pencarian dan filter untuk mempermudah pengelolaan data.

---

## 🔎 Search & Filter

### Search

Pencarian dapat dilakukan berdasarkan:

- Asset Code
- Nama Asset
- Brand
- Model

### Filter

Data dapat difilter berdasarkan status:

```text
Semua Status
Aktif
Rusak
Maintenance
```

---

## 🔄 CRUD

Aplikasi menggunakan konsep **CRUD (Create, Read, Update, Delete)**.

### Create
Menambahkan data asset baru.

### Read
Menampilkan daftar dan detail asset.

### Update
Mengubah informasi asset.

### Delete
Menghapus data asset.

---

## 🏗️ Architecture

Project menggunakan konsep **MVC (Model-View-Controller)** dari Laravel.

```text
User
 │
 ▼
Route
 │
 ▼
Controller
 │
 ├── Model ──────► MySQL Database
 │
 ▼
View (Blade)
 │
 ▼
User
```

### Model

Model digunakan untuk berinteraksi dengan database.

```text
app/Models/Asset.php
```

### Controller

Controller menangani proses aplikasi seperti:

- Menampilkan data
- Menambahkan data
- Mengubah data
- Menghapus data
- Search
- Filtering

```text
app/Http/Controllers/AssetController.php
```

### View

View digunakan untuk menampilkan halaman kepada user.

```text
resources/views/assets/
├── index.blade.php
├── create.blade.php
├── edit.blade.php
└── show.blade.php
```

---

## 📁 Project Structure

```text
asset-dashboard/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── AssetController.php
│   │
│   └── Models/
│       └── Asset.php
│
├── database/
│   └── migrations/
│       └── create_assets_table.php
│
├── resources/
│   └── views/
│       └── assets/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── show.blade.php
│
├── routes/
│   └── web.php
│
├── .env.example
├── artisan
├── composer.json
└── README.md
```

---

## 🗄️ Database

Database yang digunakan:

```text
asset_dashboard
```

Tabel utama:

```text
assets
```

Struktur tabel:

| Field | Description |
|---|---|
| id | ID asset |
| asset_code | Kode unik asset |
| name | Nama asset |
| brand | Brand / merek |
| model | Model asset |
| processor | Processor |
| ram | Kapasitas RAM |
| storage | Kapasitas penyimpanan |
| status | Status asset |
| location | Lokasi asset |
| created_at | Waktu data dibuat |
| updated_at | Waktu data diperbarui |

---

# 🚀 Installation

## 1. Clone Repository

```bash
git clone https://github.com/galang-afk/project-belajar-.git
```

Masuk ke folder project:

```bash
cd REPOSITORY
```

---

## 2. Install PHP Dependencies

```bash
composer install
```

---

## 3. Install Frontend Dependencies

```bash
npm install
```

---

## 4. Setup Environment

Copy file `.env.example` menjadi `.env`.

```bash
cp .env.example .env
```

Pada Windows, file juga dapat dibuat dengan cara menyalin:

```text
.env.example
```

menjadi:

```text
.env
```

---

## 5. Generate Application Key

```bash
php artisan key:generate
```

---

## 6. Setup Database

Buat database MySQL dengan nama:

```text
asset_dashboard
```

Kemudian sesuaikan konfigurasi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=asset_dashboard
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL pada komputer masing-masing.

---

## 7. Run Migration

Jalankan:

```bash
php artisan migrate
```

Migration digunakan untuk membuat struktur tabel database berdasarkan file migration yang terdapat di dalam project.

---

## 8. Run Application

Jalankan server Laravel:

```bash
php artisan serve
```

Kemudian buka:

```text
http://127.0.0.1:8000
```

---

# 🔐 Authentication

Aplikasi menggunakan sistem authentication Laravel.

User harus melakukan login terlebih dahulu sebelum mengakses halaman asset.

Fitur authentication meliputi:

- Login
- Logout
- Authentication middleware

Setelah berhasil login, user diarahkan ke:

```text
/assets
```

---

# 🧩 Laravel Concepts

Beberapa konsep Laravel yang digunakan dalam project ini:

- Routing
- Controller
- Model
- Migration
- Eloquent ORM
- Blade
- Authentication
- Middleware
- Form Validation
- CRUD
- Query Builder
- Search
- Filtering
- Mass Assignment
- Route Model Binding

---

# 🧪 Testing

Fitur yang telah diuji:

- [x] Login
- [x] Logout
- [x] Menampilkan dashboard
- [x] Menambahkan asset
- [x] Melihat detail asset
- [x] Mengedit asset
- [x] Menghapus asset
- [x] Search asset
- [x] Filter berdasarkan status
- [x] Statistik asset

---

# 🎯 Project Purpose

Project ini dibuat untuk mempelajari dan menerapkan:

1. Pembuatan aplikasi menggunakan Laravel
2. Integrasi Laravel dengan MySQL
3. Konsep MVC
4. Database Migration
5. CRUD
6. Authentication
7. Search dan Filtering
8. Penggunaan Git dan GitHub

---

# 👨‍💻 Author

**Galang Anugerah Adi Putra**

Laravel Internal Asset Dashboard

---

## 📌 Note

Project ini dibuat sebagai project pembelajaran dan implementasi aplikasi internal asset management menggunakan Laravel.
