<p align="center" style="font-weight:700; font-size:24px" >
<img src="public/images/logo.png" width="200" alt="Logo" style="border-radius:3rem">
<br>MyMovieGweh
</p>

# Deskripsi

MyMovieGweh adalah sebuah projek yang digunakan untuk memenuhi tugas **UTS Pemrograman berbasis Web**. Tema dari web ini adalah pencatatan film-film secara personal. Di sini, user dapat mencatat dan menyimpan film yang ingin ditonton, menandai film yang sudah ditonton dan melihat statistik mereka.

Berikut adalah alur dari aplikasi ini:

1. Login

- Halaman pertama langsung ditujukan ke halaman login
- User memasukkan username dan password (password hanya pelengkap)
- Sistem menyimpan username ke dalam session
- User diarahkan ke halaman Dashboard

2. Dashboard

- Di dalam sini terdapat navigasi, username, dan konten awal
- Konten berisi beberapa film yang baru baru ini ditambahkan
- Ada ringkasan statistik film juga

3. Profile

- Sistem menampilkan informasi user:
    - Username
    - Top Movie (diambil dari film rating tertinggi)
    - Ringkasan aktivitas (jumlah, film favorit dll)
- Tombol logout di bagian bawah

4. Pengelolaan

- Menampilkan daftar film dari array di controller
- Data ditampilkan menggunakan loop (`@foreach`)
- User dapat:
    - Melihat status film (Watched / Watchlist)
    - Filter film (Alpinejs)

<p align="end">- Author: Muchammad Nur Kholish</p>

---

# Screenshot

## Halaman Login

<p align="center">
  <img src="public/images/ss/login.png" width="75%" style="vertical-align: top;" />
  <img src="public/images/ss/login-m.png" width="24%" style="vertical-align: top;" />
</p>

---

## Dashboard

<p align="center">
  <img src="public/images/ss/dashboard.png" width="75%" style="vertical-align: top;" />
  <img src="public/images/ss/dashboard-m.png" width="24%" style="vertical-align: top;" />
</p>

---

## Profile

<p align="center">
  <img src="public/images/ss/profile.png" width="75%" style="vertical-align: top;" />
  <img src="public/images/ss/profile-m.png" width="24%" style="vertical-align: top;" />
</p>

---

## Pengelolaan

<p align="center">
  <img src="public/images/ss/pengelolaan.png" width="75%" style="vertical-align: top;" />
  <img src="public/images/ss/pengelolaan-m.png" width="24%" style="vertical-align: top;" />
</p>

---
