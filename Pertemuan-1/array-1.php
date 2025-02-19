<?php 

$ar_buah = ['Apel', 'Jeruk', 'Mangga', 'Durian', 'Rambutan'];

echo "buah ke-1: $ar_buah[0] <br>";

echo "Jumlah buah: " . count($ar_buah) . "<br>";

echo "<ol>";
foreach($ar_buah as $buah) {
     echo "<li>$buah</li>";
}

echo "</ol>";
$ar_buah[] = 'Anggur';

echo "<ol>";
unset($ar_buah[1]);

$ar_buah[4] = 'Pisang';
foreach($ar_buah as $ak => $buah) {
     echo '<li>Indeks: ' . $ak . ' Buah: ' . $buah . '</li>';
}

?>