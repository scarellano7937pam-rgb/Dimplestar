<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dimplestar - Book Now</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <?php include("php_includes/navbar.php"); ?>

  <main class="container mx-auto px-6 pt-28">
    <h1 class="text-4xl font-bold text-blue-600 mb-8">Book Your Trip</h1>

    <form action="#" method="post" class="bg-white shadow-md rounded-lg p-8 max-w-lg mx-auto">
      <div class="mb-4">
        <label class="block font-medium mb-2">Full Name</label>
        <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
      </div>
      <div class="mb-4">
        <label class="block font-medium mb-2">Email</label>
        <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
      </div>
      <div class="mb-4">
        <label class="block font-medium mb-2">Route</label>
        <select name="route" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600">
          <option>Manila - Pampanga</option>
          <option>Pampanga - Baguio</option>
          <option>Manila - Baguio</option>
        </select>
      </div>
      <div class="mb-4">
        <label class="block font-medium mb-2">Date</label>
        <input type="date" name="date" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
      </div>
      <div class="mb-4">
        <label class="block font-medium mb-2">Number of Passengers</label>
        <input type="number" name="passengers" min="1" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Book Now</button>
    </form>
  </main>

  <?php include("php_includes/footer.php"); ?>

</body>
</html>
