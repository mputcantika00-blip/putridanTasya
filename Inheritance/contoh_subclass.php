<?php
require "contoh_Superclass.php";

class Siswa extends Person{
    private string $nisn;

    public function __construct(string $nama, string $alamat, string $nisn)
    {
        parent ::__construnct($nama, $alamat);
        $this->nisn = $nisn;
    }

    public function belajar():void{
        echo "Siswa bernama : " .$this->GetNama() . " dengan NIS: ".$this->nisn. "sedang belajar mata pelajaran RPL. <br>";
    }
}

$Siswa1 = new Siswa("putri tasya", "Ngaliyan", "012345678");
$Siswa1->tampilkanInfo(); 
$Siswa1->belajar();



?>