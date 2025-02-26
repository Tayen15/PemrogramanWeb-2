<?php 

$laptop = ["Asus", "Acer", "Lenovo", "HP", "Dell"];

array_unshift($laptop, "Toshiba", "Fujitsu");

echo "<h1>Laptop</h1>\n";
echo "<ol>";
foreach($laptop as $ak => $lap) {
     echo "<li>Indeks: $ak Laptop: $lap</li>";
}

echo "</ol>";
echo "<h1>Menambah Laptop</h1>\n";
echo "<ol>";
foreach($laptop as $ak => $lap) {
     echo "<li>Indeks: $ak Laptop: $lap</li>";
}
?>