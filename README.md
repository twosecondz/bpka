# 📄 E-Surat — Sistem Surat Perjalanan Dinas (SPD)

E-Surat adalah aplikasi web berbasis **Laravel** yang digunakan untuk **membuat, mem-preview, dan mencetak Surat Perjalanan Dinas (SPD)** secara otomatis sesuai format resmi instansi pemerintahan (2 halaman A4).

## ✨ Fitur Utama
- Form input SPD
- Preview A4
- Cetak PDF 2 halaman
- Format tabel resmi
- Layout siap cetak

## 🛠️ Teknologi
- Laravel
- Blade + Tailwind
- DomPDF

## ⚙️ Instalasi
```bash
git clone https://github.com/username/e-surat.git
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan serve
```

## 🖨️ Logo PDF
Gunakan:
```blade
<img src="{{ public_path('images/logo-instansi.png') }}">
```

## 👨‍💻 Developer
Dinda
