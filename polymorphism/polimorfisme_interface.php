<?php
//kita buat interface
interface cetakable{
    //kontrak: siapapun yang meng-implements ini,
    //wajib punya method tampilkanCetak()
    public function tampilkanCetak(): void;
}

  //kelas laporanSiswa
  class LaporanSiswa implements cetakable {
    private string $namaSiswa;
    private string $kelas;

    public function __construct(string $nama, string $kelas){
        $this-> namaSiswa = $nama;
        $this-> kelas = $kelas;
    }

    //wajib menjalankan kontrak implements inteface
    //yaitu membuat isi method / fungsi tampilkanCetak()
    public function tampilkanCetak(): void
    {
        echo "<div style =
        'border : 1px solid lightgreen;
        padding: 10px;
        margin-bottom: 10px;'>";

        echo "<h3> cetak Dokumen: Rapor siswa </3>";
        echo "Nama: {$this->namaSiswa} | kelas: {$this->kelas}";
        echo "</div>";
    }
  }

   //buat kelas guru
   class LaporanGuru implements cetakable{
    private string $namaGuru;
    private string $mataPelajaran;

    public function __construct(string $nama, string $mapel) 
    {
        $this->namaGuru = $nama;
        $this->mataPelajaran = $mapel;
    }

    public function tampilkanCetak(): void
     {
        echo "<div style ='
        border: 1px solid blue;
        padding: 10px;
        margin-bottom: 10px;
        '>";

        echo "<h3> Cetak Dokumen: jadwal / Data Guru </h3>";
        echo "Nama Guru: {$this->namaGuru} |
              Mata Pelajaran: {$this->mataPelajaran}";
        echo "</div>";
     }
   }

   //buat kelas untuk mencetak berbagai macam objek
   //yang mengimplementasi  interface
   class cetakManager{
      //memeriksa data apapun selama dia mengimplementasikan
      //interface cetakable (ini adalah penerapan polimofisme-nya)
      public static function prosesCetak(cetakable $dokumen): void
      {
        //keyword static artinya: class bisa dipanggil langsung
        //tanpa harus ada objeknya
        $dokumen->tampilkanCetak();
      }
   }

   //contoh instansi objek
   echo "<h2>Daftar Cetak Dokumen Sekolah</h2>";

   //membuat objek siswa
   $siswa1 = new LaporanSiswa("Ahmad Naruto", "XI RPL 4");
   $siswa2 = new LaporanSiswa("Sakura Lestari", "XI RPL 5");
   $siswa3 = new LaporanSiswa("Annastasya Dity", "XI RPL 1");
   $siswa4 = new LaporanSiswa("Putri Cantika", "XI RPL 1");

   //membuat objek guru
   $guru1 = new LaporanGuru("Pak Jerry, S.Pd", "Matematika");
   $guru2 = new LaporanGuru("Pak Galih H , S.Pd", "Produktif Rpl");

   //mencetak menggunakan kelas CetakManager (hasil polimorfisme)
   Cetakmanager::prosesCetak($siswa1);
   Cetakmanager::prosesCetak($siswa2);
   Cetakmanager::prosesCetak($siswa3);
   Cetakmanager::prosesCetak($siswa4);
   Cetakmanager::prosesCetak($guru1);
   Cetakmanager::prosesCetak($guru2);

?>