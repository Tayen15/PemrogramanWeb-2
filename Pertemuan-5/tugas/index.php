<!DOCTYPE html>
<html lang="en">

<head>
     <title>CRUD Data</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">
     <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4 text-center">Puskesmas Sehat</h2>
          <label for="tableSelector" class="block font-semibold">Pilih Tabel:</label>
          <select id="tableSelector" onchange="showTable()" class="border p-2 rounded mb-4">
               <option value="pasien">Pasien</option>
               <option value="paramedik">Paramedik</option>
               <option value="periksa">Periksa</option>
          </select>

          <!-- Button Tambah Data (Dynamic) -->
          <div id="addButtonContainer" class="mb-4 hidden">
               <a id="addButton" href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tambah Data</a>
          </div>

          <!-- Tabel Pasien -->
          <table id="pasienTable" class="w-full mt-4 border-collapse border border-gray-300">
               <thead>
                    <tr class="bg-gray-200">
                         <th class="border border-gray-300 px-4 py-2">ID</th>
                         <th class="border border-gray-300 px-4 py-2">Kode</th>
                         <th class="border border-gray-300 px-4 py-2">Nama</th>
                         <th class="border border-gray-300 px-4 py-2">Alamat</th>
                         <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    require 'config.php';
                    $result = $koneksi->query("SELECT * FROM pasien");
                    while ($row = $result->fetch_assoc()) {
                    ?>
                         <tr class="border border-gray-300">
                              <td class="border border-gray-300 px-4 py-2"><?php echo $row['id']; ?></td>
                              <td class="border border-gray-300 px-4 py-2"><?php echo $row['kode']; ?></td>
                              <td class="border border-gray-300 px-4 py-2"><?php echo $row['nama']; ?></td>
                              <td class="border border-gray-300 px-4 py-2"><?php echo $row['alamat']; ?></td>
                              <td class="border border-gray-300 px-4 py-2">
                                   <a href="edit_data.php?tabel=pasien&id=<?php echo $row['id']; ?>" class="text-yellow-500 font-bold">Edit</a>
                                   <button onclick="confirmDelete('hapus_data.php?tabel=pasien&id=<?php echo $row['id']; ?>')" class="text-red-500 font-bold ml-2">Hapus</button>
                              </td>
                         </tr>
                    <?php } ?>
               </tbody>
          </table>

          <!-- Tabel Paramedik -->
          <table id="paramedikTable" class="w-full mt-4 border-collapse border border-gray-300 hidden">
               <thead>
                    <tr class="bg-gray-200">
                         <th class="border border-gray-300 px-4 py-2">ID</th>
                         <th class="border border-gray-300 px-4 py-2">Nama</th>
                         <th class="border border-gray-300 px-4 py-2">Kategori</th>
                         <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    $result = $koneksi->query("SELECT * FROM paramedik");
                    while ($row = $result->fetch_assoc()) {
                    ?>
                         <tr class="border border-gray-300">
                              <td class="border border-gray-300 px-4 py-2"><?php echo $row['id']; ?></td>
                              <td class="border border-gray-300 px-4 py-2"><?php echo $row['nama']; ?></td>
                              <td class="border border-gray-300 px-4 py-2"><?php echo $row['kategori']; ?></td>
                              <td class="border border-gray-300 px-4 py-2">
                                   <a href="edit_data.php?tabel=paramedik&id=<?php echo $row['id']; ?>" class="text-yellow-500 font-bold">Edit</a>
                                   <button onclick="confirmDelete('hapus_data.php?tabel=paramedik&id=<?php echo $row['id']; ?>')" class="text-red-500 font-bold ml-2">Hapus</button>
                              </td>
                         </tr>
                    <?php } ?>
               </tbody>
          </table>

          <!-- Tabel Periksa -->
          <table id="periksaTable" class="w-full mt-4 border-collapse border border-gray-300 hidden">
               <thead>
                    <tr class="bg-gray-200">
                         <th class="border border-gray-300 px-4 py-2">ID</th>
                         <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                         <th class="border border-gray-300 px-4 py-2">Pasien</th>
                         <th class="border border-gray-300 px-4 py-2">Dokter</th>
                         <th class="border border-gray-300 px-4 py-2">Berat</th>
                         <th class="border border-gray-300 px-4 py-2">Tinggi</th>
                         <th class="border border-gray-300 px-4 py-2">Tensi</th>
                         <th class="border border-gray-300 px-4 py-2">Keterangan</th>
                         <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    $result = $koneksi->query("SELECT periksa.id, periksa.tanggal, periksa.berat, periksa.tinggi, periksa.tensi, periksa.keterangan, pasien.nama AS pasien, paramedik.nama AS dokter, periksa.berat, periksa.tinggi, periksa.tensi, periksa.keterangan FROM periksa LEFT JOIN pasien ON periksa.pasien_id = pasien.id LEFT JOIN paramedik ON periksa.dokter_id = paramedik.id");
                    while ($row = $result->fetch_assoc()) {
                    ?>
                          <tr class="border border-gray-300">
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['id']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['tanggal']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['pasien']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['dokter']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['berat']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['tinggi']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['tensi']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['keterangan']; ?></td>
                                <td class="border border-gray-300 px-4 py-2">
                                      <a href="edit_data.php?tabel=periksa&id=<?php echo $row['id']; ?>" class="text-yellow-500 font-bold">Edit</a>
                                      <button onclick="confirmDelete('hapus_data.php?tabel=periksa&id=<?php echo $row['id']; ?>')" class="text-red-500 font-bold ml-2">Hapus</button>
                                </td>
                          </tr>
                    <?php } ?>
               </tbody>
          </table>
     </div>

     <script>
          document.getElementById("tableSelector").addEventListener("change", function() {
               let selectedTable = this.value;
               document.getElementById("addButtonContainer").classList.toggle("hidden", selectedTable === "");
               document.getElementById("addButton").href = "tambah_data.php?tabel=" + selectedTable;

               document.querySelectorAll("[id^='table_']").forEach(table => table.classList.add("hidden"));
               if (selectedTable) document.getElementById("table_" + selectedTable).classList.remove("hidden");
          });

          function showTable() {
               let selectedTable = document.getElementById("tableSelector").value;
               document.getElementById("pasienTable").style.display = selectedTable === "pasien" ? "table" : "none";
               document.getElementById("paramedikTable").style.display = selectedTable === "paramedik" ? "table" : "none";
               document.getElementById("periksaTable").style.display = selectedTable === "periksa" ? "table" : "none";
          }

          function confirmDelete(url) {
               if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    window.location.href = url;
               }
          }
     </script>
</body>

</html>