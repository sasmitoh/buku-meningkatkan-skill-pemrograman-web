<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

	$title = 'About';
	$image = '<img src = "img/nsc-logo.png" alt="">';
	require('include/header.php'); 
	require('include/nav.php'); 
 ?>
<section role="slider" class="slide-panel">
    <h1>HISTORY OF NGODING STUDY CLUB</h1>
    <p>Berawal dari seorang mahasiswa semester 7, Sasmitoh Rahmad Riady yang menjadi asisten salah satu dosen STT Pelita Bangsa pada mata kuliah Bahasa Pemrograman di kelas TI 17 B3 dan kelas TI 17 C1. Sasmitoh sangat antusias dalam memberikan pengajaran kepada mahasiswanya, dimulai dari penjelasan materi yang jelas dan lugas hingga tugas-tugas yang membuat para mahasiswa think hard dan kompak untuk menyelesaikannya.</p>

	<p>Sasmitoh sangat perhatian dan peduli terhadap mahasiswa tingkat awal, karena menurutnya mereka adalah generasi yang harus diselamatkan, melihat dari kondisi individu mahasiswa yang notabene-nya adalah para karyawan, dan dari segi kondisi kampus yang besar kemungkinan untuk membimbing para mahasiswa secara intens Salah satu bentuk perhatian dan kepedulian Sasmitoh adalah ia mengadakan sebuah workshop pada Minggu 15 April 2018 dengan materi “Python Tkinter Build to .exe” di kampus khusus untuk mahasiswa-mahasiswa didiknya dengan dalih perbaikan nilai UAS. Namun misi utamanya adalah bahwa ia ingin berbagi ilmu kepada mereka. Selesai workshop, grup peserta workshop di Telegram tidak dibubarkan, melainkan dipergunakan untuk melanjutkan pembahasan materi workshop. Grup tersebut bertambah fungsi, membernya tidak sekadar peserta workshop saja, tetapi juga siapapun mahasiswa STT Pelita Bangsa yang ingin ikut belajar bisa bergabung. Kemudian grup tersebut diadakan agenda rutin, yaitu Kulgram (Kuliah di Telegram) dengan berbagai materi yang disampaikan pada setiap pertemuannya yaitu setiap hari Rabu malam pukul 20.00 s.d selesai. Materi yang pertama diajarkan adalah Python Tkinter Build to .exe yang rampung dalam 3 kali pertemuan Kulgram</p>

	<p>Pada Minggu, 06 Mei 2018 diadakan pertemuan untuk member Kulgram. Kegiatannya adalah “Inull Dual Boot” yaitu menginstall ulang laptop masing-masing member dengan Dual OS, Windows dan Linux Mint.
	Selanjutnya adalah pengenalan html, di season ini Sasmitoh ditemani oleh dua rekannya yaitu Sasmita Jaya dan Nita Rahmawati yang sama-sama sedang mengerjakan tugas akhir. Pada Minggu, 13 Mei 2018 member mengadakan pertemuan ke-2 untuk mempelajari html. Pada sesi ini juga diadakan pembahasan untuk IoT Competition 2018 di Telkom University yang akan diikuti oleh 3 member kulgram yaitu Khalis Sofi, Rival Rinaldi, dan Tulasi. Dilanjutkan pada kulgram di minggu-minggu selanjutnya mempelajari html lebih lanjut.

	Pada Minggu, 03 Juni 2018 pertemuan diadakan lagi yaitu untuk mempelajari implementasi html pada website statis dilanjutkan dengan buka bersama dan merupakan pertemuan terakhir sebelum pada akhirnya grup di-vakum-kan mengingat akan merayakan Idul Fitri.

	Dengan berbagai dinamika mendidik mahasiswa member kulgram, in-out member, memberi support, nasihat, masukan, dsb. kepada member yang sedang malas atau tengah mempunyai masalah, dan berbagai bentuk kepedulian Sasmitoh lainnya, pada 25 Juni 2018, tepatnya setelah kegiatan perkuliahan mulai normal, grup kulgram dibuka kembali oleh Sasmitoh dengan berbagai rancangan agenda yang ingin ia lakukan bersama member kulgram. Di tanggal yang bersamaan, salah satu member, Khalis Sofi, mengutarakan keinginannya untuk grup Telegram agar lebih terorganisir, yaitu memberikan nama tim, ia mengajukan nama Ngoding Study Club dan Sasmitoh menyetujuinya. Pada tanggal inilah Ngoding Study Club mendeklarasikan hari berdirinya.</p>           
</section>

<?php
include_once 'include/footer.php'; 
 ?>