<?php
class Kubus {
     private $sisi;

     public function __construct($sisi) {
          $this->sisi = $sisi;
     }

     public function hitungLuas() {
          return 6 * pow($this->sisi, 2);
     }

     public function hitungKeliling() {
          return 12 * $this->sisi;
     }
}

$kubus = new Kubus(5); 
echo "Luas Kubus: " . $kubus->hitungLuas() . " satuan luas<br>";
echo "Keliling Kubus: " . $kubus->hitungKeliling() . " satuan panjang";
?>