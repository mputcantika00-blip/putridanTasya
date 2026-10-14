<?php
class Karyawan{
    private $nama;
    protected $gajiPokok;

    public function __construct($nama, $gajiPokok)
    {
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
    }
    
    public function getNama(){
        return $this->nama;
    }

    public function hitungTotalGaji(){
        return $this->gajiPokok;
    }
}

class Manager extends Karyawan{
    private $bonus;

    public function __construct
    ($nama, $gajiPokok, $bonus)
    {

    parent::__construct($nama, $gajiPokok);
    $this->bonus;
    }

    public function getBonus(){
        return $this->bonus;
    }
}

$staff = new Karyawan("putri", 5000000);
$manager1 = new Manager("tasya", 6000000, 1000000);

echo "Nama Karyawan: " .$staff->getNama(). " | Total Gaji: Rp. ". number_format($staff->hitungTotalGaji(),0, ',', '.') . "<br>";

$totalGajiManager = $manager1->hitungTotalGaji() + $manager1->getBonus();

echo "Nama Manager: " .$manager1->getNama()." | Total Gaji Rp. " .number_format($totalGajiManager,0, ',', '.') . "<br>";

?>