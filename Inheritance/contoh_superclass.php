<?php
class Person{
    private string $nama;
    private string $alamat;

    public function __construnct(string $nama, string $alamat)
    {
        $this->nama = $nama;
        $this->alamat = $alamat;
    }

    public function tampilkanInfo(): void{
        echo "Nama : " .$this->nama. "<br>";
        echo "Alamat : " .$this->alamat. "<br>";
    }

    public function GetNama(): string{
        return $this->nama;
    }

    public function GetAlamat(): string{
        return $this->alamat;
    }
}