# Dekat.In

<img src="src/md-assets/Dekatin.svg" alt="Favicon" align="center" />

Sebuah Aplikasi web untuk mencari teman sefrekuensi :D

## Dibuat oleh

Kelompok 12 <br/>

Anggota Kelompok :

- Aldi Fadlian Sunan (16520443), Frontend
- Bayu Samudra (16520420), Frontend dan Backend
- Calvin (16520209), Backend
- Firizky Ardiansyah (16520064), Frontend
- Hana Fathiyah (16520036), Frontend
- Ignasius Ferry Priguna (16520243), Backend
- Muhammad Gilang Ramadhan (16520161), Backend
- Stephanie Hutagalung (16520204), Backend
- Yohana Golkaria Nainggolan (16520493), Dokumen
- Ziyad Dhia Rafi (16520263), Frontend

## Platform

Web App

## Cara Menjalankan Aplikasi

1. Pastikan sudah menginstall Node.JS, Apache/Nginx, PHP, dan Mysql. Jalankan web server dan RDBMS.
2. Clone Repository ini pada folder web server Apache/Nginx.
3. Import database pada folder `src/Backend/db_milestone.sql`.
4. Settinglah kofigurasi pada `src/api/koneksi.php`. Pastikan anda menggunakan username, password, dan nama database yang tepat untuk mengakses database Mysql.
5. Periksa API dengan memastikan tidak muncul error saat web server menjalankan file `koneksi.php`
6. Settinglah konfigurasi pada `src/api/upload.php`. Sesuaikan dengan PATH yang diinginkan.
7. Setitnglah konfigurasi pada `src/frontend/constant.js`. Berikut penjelasan mengenai konstanta yang berada di file tersebut:

- `BASE_URL` : Root teratas dari URL
- `API_URL` : URL API
- `USER_DEFAULT_ICON` : Foto Profile default

8. Jalankan `npm start` untuk memulai frontend.
9. Selamat Menikmati :D

## Deployment
Bisa dilihat di : [https://dekatin.bayusamudra.my.id/](https://dekatin.bayusamudra.my.id/)

## Cara Memakai Aplikasi

Setelah web dibuka, user harus register terlebih dahulu. Setelah berhasil melakukan register, user harus login. Di bagian homepage, akan ditampilkan feeds dari teman. User juga dapat menge-post feeds melalui menu add feeds. User dapat mengubah profile-nya melalui menu edit profile. Untuk fitur Friends, ada menu add friends dan get recommended friends. Akan ditampilkan orang-orang yang telah menjadi teman dan juga kita dapat menemukan teman yang memiliki interest yang sama dengan kita. Untuk keluar dari web, klik logout.
