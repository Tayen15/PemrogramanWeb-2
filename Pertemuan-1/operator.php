<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Operasi Bilangan</title>
</head>
<body>
     <h1>Operasi Bilangan</h1>
     <form action="" method="post">
          <label for="">Angka 1:</label>
          <input type="number" name="a">
          <br>
          <label for="">Angka 2:</label>
          <input type="number" name="b">
          <br>
          <select name="operasi" id="">
               <option value="tambah">+</option>
               <option value="kurang">-</option>
               <option value="kali">x</option>
               <option value="bagi">/</option>
          </select>
          <br>
          <button type="submit" name="hitung">Hitung</button>
     </form>

     <?php 
          if(isset($_GET['hitung'])) {
               $a = $_GET['a'];
               $b = $_GET['b'];
               $operasi = $_GET['operasi'];

               switch($operasi) {
                    case 'tambah':
                         $hasil = $a + $b;
                         break;
                    case 'kurang':
                         $hasil = $a - $b;
                         break;
                    case 'kali':
                         $hasil = $a * $b;
                         break;
                    case 'bagi':
                         $hasil = $a / $b;
                         break;
                    default:
                         $hasil = "Operasi tidak ditemukan";
               }

               echo "Hasil: $hasil";
          }
     ?>
</body>
</html>