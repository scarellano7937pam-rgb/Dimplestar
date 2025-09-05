<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dimplestar - Routes & Schedules</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <?php include("php_includes/navbar.php"); ?>

  <main class="container mx-auto px-6 pt-28">
    <h1 class="text-4xl font-bold text-blue-600 mb-8">Routes & Schedules</h1>

    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl font-semibold mb-2">Manila - Pampanga</h2>
        <p>Daily trips starting from 5:00 AM to 9:00 PM, every 2 hours.</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl font-semibold mb-2">Pampanga - Baguio</h2>
        <p>Trips available at 6:00 AM, 12:00 PM, and 6:00 PM daily.</p>
      </div>
      <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-2xl font-semibold mb-2">Manila - Baguio</h2>
        <p>Hourly departures from 4:00 AM to 10:00 PM.</p>
      </div>
    </div>
  </main>

  <?php include("php_includes/footer.php"); ?>

</body>
</html>
