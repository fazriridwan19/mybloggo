# MyBlog.go

## Requirement
* Git
* Apache Web Server
* PHP 7.x.x atau diatasnya
* MySQL

## Instalasi
Jalankan git pada direktori aplikasi yang akan dijalankan

### install package
```bash
composer install
```

### Membuat file .env
```bash
cp .env.example .env
```

### Setting database

```bash
php artisan migrate
php artisan db:seed
```

http://127.0.0.1:8000/
