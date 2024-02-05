# SIAK

**Sistem Informasi Akuntansi Pelaporan Keuangan**

_Requirements :_
1. Download XAMPP : [Download disini](https://www.apachefriends.org/index.html)
2. Download Composer : [Download disini](https://getcomposer.org/)
3. Download Visual Studio Code : [Download disini](https://code.visualstudio.com/)


Repositori ini dibangun dengan Laravel versi 6.0 ke atas. Setelah melakukan clone dari repositori ini, lakukanlah langkah-langkah di bawah ini untuk menjalankan project.

masuk ke direktori 

`$ cd siak`

jalankan perintah composer install untuk mendownload direktori vendor

`$ composer install`


buat file .env lalu isi file tersebut dengan seluruh isi dari file .env.example (copy isi dari .env.example lalu paste di file .env)


jalankan perintah php artisan key generate


`$ php artisan key:generate`

Tambahan: Untuk pengerjaan di laptop/PC masing-masing, sesuaikan nama database, username dan password nya di file .env dengan database milik sendiri.

Setelah itu bisa lanjut. jangan lupa untuk menjalankan server laravel
`$ php artisan serve`
