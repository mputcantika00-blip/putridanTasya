<?php
//pseucode dari contoh Elemen PBO

//class laptop
//property merk,warna,harga
//method TampilkanData()
//object laptop1
class laptop
{
    public $merk;
    public $warna;
    public $harga;

    public function TampilkanData()
    {
        echo "merk:".$this->merk."<br>";
        echo "warna:".$this->warna."<br>";
        echo "harga:Rp".$this->harga."<br>";
    }
}
$laptop1 = new laptop();

$laptop1->merk ="ASUS";
$laptop1->warna ="Hitam";
$laptop1->harga =1500000;

$laptop2 = new laptop();

$laptop2->merk ="LENOVO";
$laptop2->warna ="Putih";
$laptop2->harga =2700000;

$laptop1->tampilkanData();

echo "<br>";

$laptop2->tampilkanData();
?>