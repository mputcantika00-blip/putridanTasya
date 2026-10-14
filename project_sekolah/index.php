<?php
//panggil namespace 
use App\Models\Siswa;
//bisa digunakan alias jika nama kelasnya sama persis
use App\Controller\SiswaController; 

//memuat file kelas
require_once 'App/Models/Siswa.php';
require_once 'App/controllers/SiswaController.php';

echo "<h2>Sistem Informasi Sekolah - SMK TEXMACO SEMARANG </h2>";
echo "<hr>";

//instansiasi controller dan jalankan method
$controller = new SiswaController();
$controller->prosesData();

echo "<br> <hr>";

//instansiasi object
$siswa1 = new siswa("25701", "putri tasya", "XI", "RPL");
echo "NIS: " .$siswa1->getNis(). "<br>";
echo "NAMA: " .$siswa1->getNama(). "<br>";
echo "KELAS: " .$siswa1->getKelas(). "<br>";
echo "JURUSAN: " .$siswa1->getJurusan();

?>