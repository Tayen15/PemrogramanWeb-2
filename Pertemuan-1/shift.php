<?php 

$rokok = ["Surya", "Gudang Garam", "Djarum", "Sampoerna", "Dunhill"];

$awal = array_shift($rokok);
echo "<h1>Rokok Awal</h1>\n";

echo "<ol>";
foreach($rokok as $ak => $ro) {
     echo "<li>Indeks: $ak Rokok: $ro</li>";
}
echo "</ol>";
echo "<h1>Rokok yang dihapus</h1>\n";
echo $awal;

?>