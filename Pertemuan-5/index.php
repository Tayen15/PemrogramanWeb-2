<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>List Prodi</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
     <div class="container mx-auto">
          <marquee class="text-2xl font-bold mb-4">List Prodi</marquee>
          <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
               <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                         <th class="py-3 px-6 text-left">No</th>
                         <th class="py-3 px-6 text-left">Kode</th>
                         <th class="py-3 px-6 text-left">Nama</th>
                         <th class="py-3 px-6 text-left">Kaprodi</th>
                         <th class="py-3 px-6 text-left">Edit</th>
                         <th class="py-3 px-6 text-left">Hapus</th>
                    </tr>
               </thead>
               <tbody class="text-gray-600 text-sm font-light">
                    <?php
                    require 'config.php';
                    $sql = "SELECT * FROM prodi";
                    $result = $koneksi->query($sql);
                    $prodiList = $result->fetch_all(MYSQLI_ASSOC);
                    
                    $nomor = 1;
                    foreach ($prodiList as $prodi) {
                         echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                         echo "<td class='py-3 px-6 text-left whitespace-nowrap'>{$nomor}</td>";
                         echo "<td class='py-3 px-6 text-left whitespace-nowrap uppercase'>{$prodi['kode']}</td>";
                         echo "<td class='py-3 px-6 text-left'>{$prodi['nama']}</td>";
                         echo "<td class='py-3 px-6 text-left'>{$prodi['kaprodi']}</td>";
                         echo "<td class='py-3 px-6 text-left'><a href='edit.php?id={$prodi['id']}' class='bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded'>Edit</a></td>";
                         echo "<td class='py-3 px-6 text-left'><a href='hapus.php?id={$prodi['id']}' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>Hapus</a></td>";
                         echo "</tr>";
                         $nomor++;
                    }
                    ?>
               </tbody>
          </table>
          <div class="mt-4">
               <a href="form.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Prodi
               </a>
          </div>
     </div>
</body>
</html>