<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dimplestar - Terminals</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <?php include("php_includes/navbar.php"); ?>

  <main class="container mx-auto px-6 pt-28">
    <h1 class="text-4xl font-bold text-blue-600 mb-8">Our Terminals</h1>

    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl font-semibold mb-2">Manila Terminal</h2>
        <p>Located in Cubao, Quezon City. Accessible to MRT, LRT, and bus lines.</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl font-semibold mb-2">Pampanga Terminal</h2>
        <p>Strategically located in San Fernando, serving Central Luzon passengers.</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl font-semibold mb-2">Baguio Terminal</h2>
        <p>Convenient terminal near Session Road for North Luzon destinations.</p>
      </div>
    </div>
  </main>

  <?php include("php_includes/footer.php"); ?>

</body>
</html>
