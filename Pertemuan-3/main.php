<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Main Layout</title>
     <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">
     <?php include 'components/header.php'; ?>

     <div class="flex">
          <?php include 'components/sidebar.php'; ?>
          <div class="container mx-auto p-4">
               <div class="flex">
     
                    <main class="flex-1 p-4 bg-white rounded shadow">
                          <h1 class="text-2xl font-bold mb-4">Hasil Nilai UTS</h1>
                          <p>Berikut adalah hasil nilai UTS Anda:</p>
                    </main>
               </div>
          </div>
     </div>

     <?php include 'components/footer.php'; ?>
</body>
</html>