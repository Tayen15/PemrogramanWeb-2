<?php 

class PersegiPanjang {
     public $panjang;
     public $lebar;

     function __construct($panjang, $lebar) {
          $this->panjang = $panjang;
          $this->lebar = $lebar;
     }

     function getLuas() {
          return $this->panjang * $this->lebar;
     }

     function getKeliling() {
          return 2 * ($this->panjang + $this->lebar);
     }
}

?>

<h2>Contoh Penggunaan Persegi Panjang</h2>
<?php 

$pp = new PersegiPanjang(30, 30);

echo "Panjang: $pp->panjang <br>";
echo "Lebar: $pp->lebar <br>";
echo "Luas: " . $pp->getLuas() . "<br>";
echo "Keliling: ". $pp->getKeliling() . "<br>";
?>