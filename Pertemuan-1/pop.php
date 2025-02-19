<?php 

$siswa = ["Budi", "Susi", "Lala", "Rudi", "Fany"];
echo "<h1>Daftar Siswa</h1>\n";
print_r($siswa);

$orang_terakhir = array_pop($siswa);
echo "<h1>Orang Terakhir</h1>\n";
echo $orang_terakhir;

echo "<br>Orang yang akan dihapus " . $orang_terakhir;

echo "<br>Array setelah penghapusan: <br>";
print_r($siswa);
?>