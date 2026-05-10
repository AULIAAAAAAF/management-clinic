# Sistem Manajemen Klinik

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.5-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/TailwindCSS-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind">
</p>

## 📋 Deskripsi

Sistem Manajemen Klinik adalah aplikasi berbasis web untuk mengelola operasional klinik secara lengkap. Aplikasi ini dibangun menggunakan Laravel 12 dengan berbagai fitur untuk pasien, dokter, dan admin.

## 🚀 Fitur

### Untuk Pasien
- ✅ Dashboard pasien dengan ringkasan aktivitas
- ✅ Booking jadwal konsultasi dengan dokter
- ✅ Melihat status antrian secara real-time
- ✅ Riwayat konsultasi
- ✅ Edit profil data diri (NIK, alamat, telepon, dll)

### Untuk Admin
- ✅ Dashboard admin dengan statistik
- ✅ Kelola antrian (panggil, selesai, skip)
- ✅ Manajemen semua booking
- ✅ Daftar dokter dan pasien
- ✅ Konfirmasi/ubah status booking

### Untuk API
- ✅ RESTful API untuk pasien
- ✅ RESTful API untuk dokter
- ✅ RESTful API untuk antrian

## 🛠️ Teknologi

| Komponen | Teknologi |
|----------|-----------|
| Backend | Laravel 12 (PHP 8.5) |
| Database | MySQL / MariaDB |
| Frontend | TailwindCSS + Blade |
| Auth | Laravel Breeze |
| Server | PHP Built-in / Apache / Nginx |

## 📦 Instalasi

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm
- MySQL / MariaDB
- XAMPP / Laravel Sail / Docker (opsional)

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/AULIAAAAAAF/management-clinic.git
cd management-clinic

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Setup database MySQL
# Buat database 'clinic_db' terlebih dahulu
# Edit .env dengan konfigurasi MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=clinic_db
# DB_USERNAME=root
# DB_PASSWORD=your_password

# 5. Run migration
php artisan migrate

# 6. Seed data (opsional)
php artisan db:seed

# 7. Build frontend
npm run build

# 8. Run server
php artisan serve
```

### Akun Default (Setelah Seeder)

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@clinic.com | password |
| Pasien | test@example.com | password |

## 📁 Struktur Project

```
management-clinic/
├── app/
│   ├── Http/Controllers/    # Controllers
│   │   ├── AdminController.php
│   │   ├── PasienController.php
│   │   ├── DokterController.php
│   │   └── BookingController.php
│   └── Models/             # Eloquent Models
│       ├── Pasien.php
│       ├── Dokter.php
│       ├── Booking.php
│       └── Antrian.php
├── database/
│   ├── migrations/         # Database migrations
│   ├── seeders/           # Data seeders
│   └── factories/         # Model factories
├── routes/
│   ├── web.php            # Web routes
│   └── api.php            # API routes
├── resources/
│   └── views/             # Blade templates
│       ├── pasien/        # Views pasien
│       ├── admin/         # Views admin
│       └── layouts/       # Layout templates
└── docs/
    └── API.md             # Dokumentasi API
```

## 🔌 API Endpoints

### Pasien
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/pasien` | List semua pasien |
| POST | `/api/pasien` | Tambah pasien baru |
| GET | `/api/pasien/{id}` | Detail pasien |
| PUT | `/api/pasien/{id}` | Update pasien |
| DELETE | `/api/pasien/{id}` | Hapus pasien |

### Dokter
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/dokter` | List semua dokter |
| POST | `/api/dokter` | Tambah dokter baru |
| GET | `/api/dokter/{id}` | Detail dokter |
| PUT | `/api/dokter/{id}` | Update dokter |
| DELETE | `/api/dokter/{id}` | Hapus dokter |

### Antrian
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/antrian` | List semua antrian |
| GET | `/api/antrian/{id}` | Detail antrian |
| PATCH | `/api/antrian/{id}` | Update status antrian |
| GET | `/api/antrian/next/{dokterId}` | Ambil antrian berikutnya |

## 🧩 Struktur Database

### Tabel users
Tabel default Laravel untuk autentikasi user.

### Tabel pasien
| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| id | bigint | Primary key |
| user_id | bigint | FK ke users |
| nik | varchar(16) | NIK (unique) |
| tanggal_lahir | date | Tanggal lahir |
| jenis_kelamin | enum | L / P |
| alamat | text | Alamat |
| no_telp | varchar(20) | No. Telepon |

### Tabel dokter
| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| id | bigint | Primary key |
| nama | varchar | Nama dokter |
| spesialis | varchar | Spesialisasi |
| no_telp | varchar(20) | No. Telepon |
| alamat | text | Alamat |

### Tabel booking
| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| id | bigint | Primary key |
| pasien_id | bigint | FK ke pasien |
| dokter_id | bigint | FK ke dokter |
| tanggal_booking | datetime | Jadwal booking |
| status | enum | pending/confirmed/completed/cancelled |
| keluhan | text | Keluhan pasien |

### Tabel antrian
| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| id | bigint | Primary key |
| booking_id | bigint | FK ke booking |
| nomor_antrian | int | Nomor antrian |
| status | enum | waiting/called/completed/skipped |
| waktu_panggil | time | Waktu dipanggil |

## 🔧 Konfigurasi

### Setup MySQL dengan Password

```bash
# Login ke MySQL
mysql -u root -p

# Buat database
CREATE DATABASE clinic_db;

#.Exit dan edit .env
```

### Konfigurasi .env
```env
APP_NAME=Klinik
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clinic_db
DB_USERNAME=root
DB_PASSWORD=123456
```

## 📝 Pengembangan Lanjutan

### Menambah Fitur Baru
1. Buat migration: `php artisan make:migration create_nama_tabel`
2. Buat model: `php artisan make:model NamaModel`
3. Buat controller: `php artisan make:controller NamaController`
4. Tambah route di `routes/web.php` atau `routes/api.php`
5. Buat view di `resources/views/`

### Reset Database
```bash
# Hapus semua data dan seed ulang
php artisan migrate:fresh --seed
```

## 📄 Lisensi

Project ini adalah open-source software yang dilisensikan di bawah MIT License.

## 👨‍💻 Kontribusi

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/fitur`)
3. Commit perubahan (`git commit -m 'Add fitur baru'`)
4. Push ke branch (`git push origin feature/fitur`)
5. Buat Pull Request

---

Dibuat dengan ❤️ menggunakan Laravel 12