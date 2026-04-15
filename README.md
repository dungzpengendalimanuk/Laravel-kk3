<img width="959" height="536" alt="1" src="https://github.com/user-attachments/assets/9ff1711c-1a93-48dc-b405-0c73fad3e9c9" /># 📋 Sistem Manajemen Karyawan — Laravel Eloquent

Aplikasi web CRUD manajemen karyawan dan departemen menggunakan Laravel Eloquent ORM. Dibuat sebagai tugas pengenalan Eloquent dengan fitur tambahan **Search**, **Filter**, dan **Relasi Model**.

---

## ✨ Fitur Utama

| No | Fitur | Deskripsi |
|----|-------|-----------|
| 1 | **CRUD Karyawan** | Tambah, lihat, edit, dan hapus data karyawan |
| 2 | **CRUD Departemen** | Tambah, lihat, edit, dan hapus data departemen |
| 3 | **Relasi Model** | Model Karyawan `belongsTo` Departemen, Departemen `hasMany` Karyawan |
| 4 | **Join / Eager Loading** | Data karyawan ditampilkan bersama nama departemen (`with('departemen')`) |
| 5 | **Search** | Pencarian karyawan berdasarkan nama atau posisi |
| 6 | **Filter** | Filter karyawan berdasarkan departemen |
| 7 | **Custom Style** | UI modern dengan glassmorphism, gradient, dan sidebar navigation |

---

## 🏗️ Struktur Model & Relasi

```
Departemen (1) ──────── (∞) Karyawan
   hasMany                 belongsTo
```

### Model Karyawan
- `id` — Primary Key
- `nama` — Nama karyawan
- `posisi` — Posisi/jabatan
- `departemen_id` — Foreign key ke tabel departemens
- `timestamps`

### Model Departemen (Model Baru)
- `id` — Primary Key
- `nama_departemen` — Nama departemen
- `deskripsi` — Deskripsi departemen
- `timestamps`

---

## 🔍 Fitur Search & Filter

### Search
Pencarian dilakukan pada kolom `nama` dan `posisi` menggunakan query `LIKE`:
```php
$query->where(function ($q) use ($search) {
    $q->where('nama', 'like', "%{$search}%")
      ->orWhere('posisi', 'like', "%{$search}%");
});
```

### Filter Departemen
Filter karyawan berdasarkan departemen menggunakan dropdown:
```php
if ($request->filled('departemen_id')) {
    $query->where('departemen_id', $request->departemen_id);
}
```

---

## 🎨 Custom Style

Desain UI telah di-custom dengan pendekatan **simple & elegant**:

- **Sidebar Navigation** — Navigasi samping dengan ikon SVG dan active state
- **Glassmorphism Cards** — Efek blur & transparan pada card (backdrop-blur)
- **Gradient Buttons** — Tombol dengan gradient indigo-purple
- **Badge/Pill Styling** — Posisi dan departemen ditampilkan sebagai badge berwarna
- **Hover Animations** — Efek hover pada tombol dan baris tabel
- **Google Fonts (Inter)** — Typography modern yang bersih
- **Empty State** — Tampilan khusus saat data kosong
- **Confirmation Dialog** — Konfirmasi sebelum hapus data

---

## 🚀 Cara Menjalankan

### 1. Clone Repository
```bash
git clone <url-repository>
cd introduction-to-eloquent-main
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Jalankan Migration & Seeder
```bash
php artisan migrate
php artisan db:seed --class=DepartemenSeeder
```

### 5. Build Assets & Jalankan Server
```bash
npm run build
php artisan serve
```

Buka browser: **http://localhost:8000/karyawan**

---

## 📁 Struktur File Penting

```
app/
├── Models/
│   ├── Karyawan.php          ← Model dengan relasi belongsTo Departemen
│   └── Departemen.php        ← Model baru dengan relasi hasMany Karyawan
├── Http/Controllers/
│   ├── KaryawanController.php   ← CRUD + Search + Filter + Join
│   └── DepartemenController.php ← CRUD Departemen

database/
├── migrations/
│   ├── 2026_03_31_..._create_karyawans_table.php
│   └── 2026_04_15_..._create_departemens_table.php  ← Migration baru
├── seeders/
│   └── DepartemenSeeder.php  ← Seeder data departemen awal

resources/views/
├── layouts/
│   └── main.blade.php        ← Layout custom dengan sidebar
├── karyawan/
│   ├── index.blade.php       ← Tabel + Search + Filter
│   ├── tambah.blade.php      ← Form tambah (dengan dropdown departemen)
│   └── edit.blade.php        ← Form edit (dengan dropdown departemen)
├── departemen/
│   ├── index.blade.php       ← Tabel departemen + jumlah karyawan
│   ├── tambah.blade.php      ← Form tambah departemen
│   └── edit.blade.php        ← Form edit departemen

routes/
└── web.php                   ← Route CRUD Karyawan & Departemen
```

---

## 📸 Hasil Pengerjaan Web

<img width="959" height="536" alt="1" src="https://github.com/user-attachments/assets/9da177a5-c337-4d63-aeee-e544fd11a71b" />

<img width="959" height="536" alt="2" src="https://github.com/user-attachments/assets/979f9bea-8545-46a0-a2d0-0f4f788bc895" />

<img width="959" height="536" alt="3" src="https://github.com/user-attachments/assets/7644132b-8066-4994-8760-b0b17dccedb2" />


---

## 🛠️ Teknologi

- **Laravel 12** — PHP Framework
- **Eloquent ORM** — Object Relational Mapping
- **TailwindCSS 4** — Utility-first CSS Framework
- **Vite** — Build tool untuk assets
- **SQLite** — Database (default)

---

## 👤 Pembuat

Dibuat sebagai tugas Introduction to Eloquent — Laravel.
