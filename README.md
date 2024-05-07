<h1 align="center">Laravel 10 OneLearn</h1>

## Author

Laravel 10 OneLEarn dibuat oleh :

- TEGAR FATUR RACHMAN      ( 220533602991 )
- TEGAR PUTRA PRADANA      (  )
- WILDAN ALFIN HAMDANI     (  )
- YAZID RAHMAT ABDILLAH    (  )

## Fitur 

- Autentikasi Admin, Petugas dan User
- CRUD Kategori
- CRUD Buku
- CRUD Penerbit
- Melakukan peminjaman buku
- Melakukan pengembalian buku
- Menggunakan admin LTE
- Dan lain-lain

## User

**Admin**

- username: admin
- Password: 123

**Petuags**

- username: petugas
- Password: 123

**Peminjam**

- username: user
- Password: 123

## Install

**Clone Repository**

```bash
git clone https://github.com/TegarFtr/educraft.git
```

**Download zip**

```bash
extract file zip
```

## Buka di kode editor


## Install composer

```bash
composer install
```

## Copy .Env

```bash
copy .env.example menjadi .env
```

## Buka Web Server


## Buat database di localhost 

```bash
nama database : ta_onelearn
```

## Setting database di .env

```bash
DB_PORT=3306
DB_DATABASE=ta_onelearn
DB_USERNAME=root
DB_PASSWORD=
```

## Generate key

```bash
php artisan key:generate
```

## Jalankan migrate dan seeder

```bash
php artisan migrate --seed
```
```bash
php artisan db:seed --class=UserSeeder
```

## Buat Storage Link

```bash
php artisan storage:link
```

## Jalankan Serve

```bash
php artisan serve
```

## License

- Copyright © 2024 Kelompok 8.
