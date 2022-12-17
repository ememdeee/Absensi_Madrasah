# Sistem Presensi Online berbasis Progressive Web Apps menggunakan Framework Laravel - Hasil PKL di CV. Girisa Teknologi
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://media-exp1.licdn.com/dms/image/C4D0BAQGuDbCAAaLtNg/company-logo_200_200/0/1519952615316?e=2147483647&v=beta&t=xHl6DS7K0TAcPrECgEMtMzWLKxJpG6OdsXWgwU0DooE" width="200"></a></p>

<p align="center">
<a href="https://www.linkedin.com/company/girisa-teknologi/about/"><img src="https://play-lh.googleusercontent.com/kMofEFLjobZy_bCuaiDogzBcUT-dz3BBbOrIEjJ-hqOabjK8ieuevGe6wlTD15QzOqw" alt="Build Status" width="30"></a>
<a href="https://goo.gl/maps/UT8G28NPijwcrTFv8"><img src="https://storage.googleapis.com/gweb-uniblog-publish-prod/images/Maps_Pin_FullColor.max-1000x1000.png" alt="Build Status" width="30"></a>
</p>

## Tentang Aplikasi Presensi Daring 

Aplikasi sistem presensi online berbasis progressive web apps ini dibangun atas permintaan client dan juga CV. Girisa Teknologi sebagai tugas untuk menyelesaikan Praktik Kerja Lapangan selama 6 bulan yang saya tempuh di perusahaan yang bersangkutan. Hasil dari sistem yang dibangun diharapkan dapat memenuhi kebutuhan kantor Cv. Girisa Teknologi untuk merekap data kehadiran pegawai dengan efektif dan juga dapat memenuhi kepuasan client Girisa Teknologi yang memerlukan sebuah sistem presensi daring untuk kegiatan mereka. Aplikasi berbasis progressive web apps ini dibangun tidak jauh dari fitur fitur yang disediakan dari beberapa framework dan juga sitem seperti:

- [Laravel](https://laravel.com).
- [Progressive Web Apps](https://web.dev/progressive-web-apps/).
- [Bootstrap](https://getbootstrap.com).
- [Leaflet](https://leafletjs.com).
- Login & Registrasi.
- Pelacakan Lokasi (Latitude & Longitude).
- Perhitungan jarak antar 2 titik lokasi (user dan kantor).
- Akun Admin.
- Hasil Rekap Presensi dari User (Khusus Admin).

## Fitur Aplikasi

Dasarnya diperlukan sebuah sistem untuk melakukan presensi online yang dapat diakses dengan mudah, maka dibuatlah sebuah sistem presensi online berbasis website yang dilengkapi dengan progressive web apps agar dapat diunduh dan diakses dengan cepat oleh user layaknya menggunakan aplikasi android dan dibangun menggunakan framework Laravel. Hasil dari sistem presensi daring berbasis progressive web apps dapat dilihat pada serangkaian sub bab dibawah ini antara lain adalah halaman home, login, registrasi, halaman presensi, dan dashboard (khusus admin)

### Home

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/ememdeee/Sistem-Absensi-Online-Girisa-Teknologi/blob/master/dokumentasi/home.jpg" width="200"></a></p>

Halaman home akan memberikan penjelasan singkat mengenai kegunaan dari aplikasi websiteyang dibangun, desain simple dan jelas yang digunakan pada aplikasi website ini dibangun menggunakan CSS Framework Booststrap. Pada halaman home juga diberikan tombol utama (presensi) yang akan mengarahkan pada halaman presensi yang dimana jika user belum melakukan login akan dilempar pada halaman login terlebih dahulu.

### Login & Registrasi

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/ememdeee/Sistem-Absensi-Online-Girisa-Teknologi/blob/master/dokumentasi/login.jpg" width="200"></a>
<a href="https://laravel.com" target="_blank"><img src="https://github.com/ememdeee/Sistem-Absensi-Online-Girisa-Teknologi/blob/master/dokumentasi/registrasi.jpg" width="200"></a></p>

Sebelum dapat melakukan input data kehadiran, user diharuskan untuk melakukan login terlebih dahulu. Dapat dilihat bagaimana user interface dari halaman login dan registrasi pada gambar yang terlampir diatas.

### Halaman Presensi

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/ememdeee/Sistem-Absensi-Online-Girisa-Teknologi/blob/master/dokumentasi/Picture1.jpg" width="200"></a>
<a href="https://laravel.com" target="_blank"><img src="https://github.com/ememdeee/Sistem-Absensi-Online-Girisa-Teknologi/blob/master/dokumentasi/Picture2.jpg" width="200"></a></p>

Pada halaman utama dari aplikasi website ini pertama akan disedia kan section yang menunjukan peta real time yang menunjukan 2 buah titik point yaitu lokasi user dan lokasi kantor, dengan disediakannya section map ini akan lebih mudah bagi user untuk mengetahui seberapa jauh jarak ia ke kantor karena pada dasarnya **TERDAPAT SYARAT JARAK MINIMUM ANTARA USER DAN KANTOR JIKA USER INGIN MELAKUKAN PRESENSI** yaitu >=20 Meter (admin dapat mengatur sesuka hati pada halaman admin).

- Gambar pertama (kiri) adalah contoh dari proses input data kehadiran jika user berada **jauh dari kantor (input data gagal)**

- Gambar kedua (kanan) adalah contoh dari proses input data kehadiran jika user berada **dekat dari kantor (input data berhasil)**

### Dashboard (khusus admin)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/ememdeee/Sistem-Absensi-Online-Girisa-Teknologi/blob/master/dokumentasi/dashboard1.jpg" width="228"></a>
<a href="https://laravel.com" target="_blank"><img src="https://github.com/ememdeee/Sistem-Absensi-Online-Girisa-Teknologi/blob/master/dokumentasi/dashboard2.jpg"></a></p>

Halaman dashboard adalah halaman khusus yang hanya dapat didatangi oleh user dengan role Admin dimana user tersebut sudah dibuat diawal dengan memanfaatkan teknik seeding dan asign role Laravel pada database user. Pada halaman ini admin memeiliki 3 fitur yaitu: 
- Melihat hasil presensi pada hari ini (Halaman Utama Dashboard)
- Melihat hasil presensi user tertentu dengan kurun waktu tertentu (Advanced Search)
- Mengganti lokasi kantor (Latitude & Longitude)

## Kesimpulan

Aplikasi website berbasis progressive Web Apps ini bekerja dengan cukup baik dimana dapat diakses dengan mudah layaknya menggunakan sebuah aplikasi android karena fungsi khusus dari website modern yaitu Progressive Web Apps dan dengan baik dapat digunakan untuk melakukan rekap data kehadiran disuaru instansi. Pada projek selanjutnya akan segera saya tambahkan sebuah persyaratan menarik lainya dalam melakukan presensi online yaitu sebuah sistem pengenalan wajah sebagai sistem keamanan tambahan yang juga dilapisi sistem keamanan lainya yaitu [Liveness Detection](https://www.electronicid.eu/en/blog/post/face-liveness-detection-spoofing-face-recognition/en) menggunakan teknik [Machine Learning](https://www.sas.com/en_us/insights/analytics/machine-learning.html#:~:text=Machine%20learning%20is%20a%20method,decisions%20with%20minimal%20human%20intervention). Tunggu unggahan terbaru selanjutnya di repository saya lainya (coming soon). 

## Kontributor

Terimakasih untuk bimbinganya dalam pelaksanaan Praktik Kerja Lapangan atau Internship yang saya lalui selama 6 bulan di CV. Girisa Teknologi terutama kepada Dosen Pembimbing 1 Pak Ir. Oesman Hendra Kelana, M.Div, M.Cs, Dosen pembimbing lapangan Pak Masngud dari Girisa Teknologi, kawan saya [Chesa](https://google.com) sebagai teman coding dan bertukar pikiran dari Universitas Malang, dan teman teman lainya dengan dukungan moral yang juga sangat berarti.
