<?php
// parent class
class pegawai{
    protected $nama_pegawai;
    protected $gaji_pegawai;

    //method construct
    public function __construct($nama_pegawai, $gaji_pegawai) {
        $this->nama_pegawai = $nama_pegawai;
        $this->gaji_pegawai = $gaji_pegawai;
    }

    //fungsi getter untuk ambil nama
    public function getNama(){
        return $this->nama_pegawai;
    }

    //method dasar dari parent class
    public function hitungGaji(){
        return $this->gaji_pegawai;
    }

}

//polimorfisme dengan inheritance, menggunakan overriding
class freelancer extends pegawai{
    private $projectRate;
    private $jumlahProject;

    public function __construct($nama_pegawai, $projectRate, $jumlahProject){
        //gaji di buat 0, karena freelancer hanya di bayar per project
        parent:: __construct($nama_pegawai, 0);
        $this->projectRate = $projectRate;
        $this->jumlahProject = $jumlahProject;
    }
        //overriding untuk menghitung ulang gaji
        //menimpa atau menulis kembali karakteristik method hitungGaji
        public function hitungGaji()
        {
            return $this->projectRate * $this->jumlahProject;
        }
}       
        //child class kedua
        class KaryawanTetap extends pegawai{
          private $tunjangan;

          public function __construct($nama_pegawai, $gaji_pegawai, $tunjangan)
          {
            parent:: __construct($nama_pegawai, $gaji_pegawai);
            $this->tunjangan = $tunjangan;
          }

          //polimorfisme dengan overriding/menimpa karakteristik
          public function hitungGaji() 
          {
            //ambil gaji pokok dari parent lalu tambahkan tunjangan
            return parent::hitungGaji() + $this->tunjangan;
          }

        }

        //buat fungsi untuk melihat hasil penerapan polimorfisme 
       function cetakGaji(pegawai $pegawai) { //menerima objek pegawai dan tunjangan
       echo"Gaji " .$pegawai->getNama(). ": Rp. ".
       number_format($pegawai->hitungGaji(), 0, ',','.'). "<br>";
        }
       
        //penggunaan class dan fungsi

        $pegawaiBiasa = new Pegawai("Chiko",3000000);
        $pegawaiFreelancer = new freelancer("Miguel", 2000000, 4);
        $pegawaiTetap = new KaryawanTetap("James",5000000,2000000);

        //Menggunakan satu fungsi yang sama untuk berbagai objek
        cetakGaji($pegawaiBiasa);
        cetakGaji($pegawaiFreelancer);
        cetakGaji($pegawaiTetap);



?>