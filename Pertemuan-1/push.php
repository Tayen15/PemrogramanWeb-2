<?php 

$komponen = ["CPU", "RAM", "Motherboard", "VGA", "SSD"];
echo "<h1>Daftar Komponen</h1>\n";

echo "<ol>";
foreach($komponen as $ak => $kom) {
     echo "<li>Indeks: $ak Komponen: $kom</li>";
}
echo "</ol>";
array_push($komponen, "HDD", "ODD");

echo "<h1>Menambah Komponen</h1>\n";
echo "<ol>";
foreach($komponen as $ak => $kom) {
     echo "<li>Indeks: $ak Komponen: $kom</li>";
}

?>