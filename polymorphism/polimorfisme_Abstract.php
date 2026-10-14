<?php
    //kita buat abstrak baru
    //abstrak itu adalah class yg tidak bisa dipakai langsung jadi object
    abstract class Notifikasiweb{
        protected string $penerima;
        protected string $pesan;

        public function __construct(string $penerima, string $pesan)
       {
        $this->penerima = $penerima;
        $this->pesan = $pesan;
       }

    //method bisa yg diwariskan dan 
    //digunakan langsung oleh kelasnturunannya
    public function getInfoPengirim(): string{
        return "Mengirim ke: {$this->penerima}";
      }


    //abstract method: kontrak wajib yg harus di-override
    //oleh kelas turunannya
    abstract public function kirimNotifikasi(): void;
  }

    //kelas turunan 1: notifikasi via email
    class Notifemail extends NotifikasiWeb{
        private string $subjek;

        public function __construct(string $penerima, string $pesan, 
        string $subjek)
       {
        parent::__construct($penerima, $pesan);
        $this->subjek = $subjek;
       }

    //wajib meng-overide abstract method dari parent class
    public function kirimNotifikasi(): void
    {

        echo "<div style='border:2px solid #007bff;
        padding: 10px;
        margin-bottom: 10px;
        backgroun-color: #f8f9fa;'
        >";
        
        echo "<h4>[EMAIL] - subjek: {$this->subjek}</h4>";
        echo "<p>{$this->getInfoPengirim()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
    
    }
}

    //kelas turunan 2: Notifikasi via whatsApp
    //kelas NotifikasiWA;
    class NotifWA extends NotifikasiWeb{
        //wajiib overriding abstract method dari parent
        public function kirimNotifikasi(): void
        {
            echo "<div style = 'border:2px solid #28a745;
                                padding: 10px;
                                margin-bottom: 10px;
                                background-color: #e8f5e9;
                                '>";
            
            echo "<h4>[WhatsApp MESSAGE]</h4>";
            echo "<p>{$this->getInfoPengirim()}</p>";
            echo "<p>Pesan: <i>{$this->pesan}</i></p>";
            echo "</div>";                    
        }
    }

    //kelas Turunan 3 Notifikasi Browser
    class NotifBrowser extends NotifikasiWeb{
        private string $browserApp;

        public function __construct(string $penerima, string $pesan, string $browserApp)
        {
            parent::__construct($penerima, $pesan);
            $this->browserApp = $browserApp;
        }

        //wajib override abstract method dari parent
        public function kirimNotifikasi(): void
        {
            echo "<div style='border:1px solid #ffc107;
                              padding: 10px; margin-bottom:10px;
                              background-color:#fff3cd;'>";
            echo "<h4>[PUSH NOTIF] - Browser: {$this->browserApp}</h4>";
            echo "<p>{$this->getInfopengirim()}</p>";
            echo "<p>Notif: <i>{$this->pesan}</i></p>";
            echo "</div>";                    
        }
    }

    //Buat class manager untuk menerapkan polimorfisme
    class NotifManager{
        //menerima tipe data berdasar abstract class
        //apapun objeknya, asalkan turunan notifikasiWeb, bisa masuk
        public static function proseskirim(NotifikasiWeb $notif): void{
        $notif->kirimNotifikasi(); 
        }
    }


    class NotifGitHub extends NotifikasiWeb{
        public function  kirimNotifikasi(): void
        {
            echo "<div style='border=2px solid #FFC0CB;
                              padding:5px;
                              margin-bottom:10px;
                              background-color: #FF69B4;
                              '>";

            echo "<h2>[GitHub]</h2>";
            echo "<p>{$this->getInfopengirim()}</p>";
            echo "<p>pesan: <i>{$this->pesan}</i></p>";
            echo "</div>";                  
        }
    }
    //penggunaan dan instansiasi objek
    echo "<h2>Dashbroad Simulasi Pengiriman Notfikasi Web</2>";
    
    //membuat berbagai macam objek notif
    $notif1 = new notifEmail("tasya@gmail.com", "Akun anda berhasil didaftarkan.", "Konfirmasi Akun");
    $notif2 = new NotifWA("098754899", "kode OTP Anda adalah 9876 jangan berikan ke siapa pun!");
    $notif3 = new NotifBrowser("Token_Device_Asus", "Ada diskon 40% untuk produk pilihan Anda!", "Google Chrome");
    $notif4 = new NotifGitHub("GitHub","kode telah  diterima");

    //mengirim dan menampilkan semua notif secara
    //polimorfisme melalui manager
    NotifManager::prosesKirim($notif1);
    NotifManager::prosesKirim($notif2);
    NotifManager::prosesKirim($notif3);
    NotifManager::prosesKirim($notif4);


?>