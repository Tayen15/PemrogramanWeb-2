<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Form Output</title>
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
     <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
          <h2 class="text-2xl font-bold mb-6">Form Output</h2>
          <?php
          $formData = [
               'name' => $_POST['name'] ?? 'N/A',
               'email' => $_POST['email'] ?? 'N/A'
          ];
          ?>
          <div class="mb-4">
               <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
               <p class="bg-gray-200 p-2 rounded"><?php echo htmlspecialchars($formData['name']); ?></p>
          </div>
          <div class="mb-4">
               <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
               <p class="bg-gray-200 p-2 rounded"><?php echo htmlspecialchars($formData['email']); ?></p>
          </div>
     </div>
</body>
</html>