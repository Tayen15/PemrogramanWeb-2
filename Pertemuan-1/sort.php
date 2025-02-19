<?php 
$ar_buah = ["a"=>"Apel", "b"=>"Jeruk", "c"=>"Mangga", "d"=>"Durian", "e"=>"Rambutan"];
echo "<h1>Sort Array</h1>";
echo "<h2>Sebelum diurutkan</h2>";
echo "<ol>";
foreach($ar_buah as $ak => $buah) {
     echo "<li>Indeks: $ak Buah: $buah</li>";
}
echo "</ol>";
echo "<h2>Setelah diurutkan</h2>";
asort($ar_buah);
echo "<ol>";
foreach($ar_buah as $ak => $buah) {
     echo "<li>Indeks: $ak Buah: $buah</li>";
}

?>