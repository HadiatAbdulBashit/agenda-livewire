# My Action Plan / Agenda dengan Laravel Livewire dan Bootstrap

## Pendahuluan
Aplikasi Agenda ini dibangun menggunakan framework Laravel dengan Livewire sebagai library untuk komponen dinamis tanpa memerlukan JavaScript secara langsung. Bootstrap digunakan untuk styling agar tampilan lebih menarik dan responsif.

## Prasyarat
Sebelum menginstal aplikasi, pastikan Anda telah menginstal perangkat lunak berikut:
- PHP >= 8.0
- Composer
- Node.js & NPM
- MySQL atau database lainnya yang didukung Laravel

## Instalasi
### 1. Clone Repository
Jalankan perintah berikut untuk mengunduh kode sumber aplikasi:
```sh
 git clone https://github.com/HadiatAbdulBashit/agenda-livewire.git
 cd agenda-app
```

### 2. Instal Dependensi Laravel
Jalankan perintah berikut untuk menginstal dependensi PHP:
```sh
 composer install
```

### 3. Konfigurasi Environment
Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:
```sh
 cp .env.example .env
```

Edit file `.env` dan atur konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agenda_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```sh
 php artisan key:generate
```

### 5. Migrasi Database
```sh
 php artisan migrate
```

### 6. Instalasi Node Modules dan Compile Assets
```sh
 npm install
 npm run dev
```

## Menjalankan Aplikasi
Jalankan perintah berikut untuk memulai server aplikasi:
```sh
 php artisan serve
```
Akses aplikasi di browser melalui: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Fitur Aplikasi
- Menambahkan agenda baru
- Mengedit dan menghapus agenda
- Kategori berdasarkan prioritas

## Penutup
Aplikasi Agenda ini memanfaatkan Laravel Livewire untuk membuat komponen interaktif tanpa perlu banyak kode JavaScript. Dengan menggunakan Bootstrap, tampilan aplikasi menjadi lebih modern dan responsif.

