<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dimplestar - Contact Us</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <?php include("php_includes/navbar.php"); ?>

  <main class="container mx-auto px-6 pt-28">
    <h1 class="text-4xl font-bold text-blue-600 mb-8">Contact Us</h1>

    <div class="grid md:grid-cols-2 gap-8">
      <div>
        <h2 class="text-2xl font-semibold mb-4">Get in Touch</h2>
        <p class="mb-2">Email: <span class="text-blue-600">support@dimplestar.com</span></p>
        <p class="mb-6">Phone: <span class="text-blue-600">+63 912 345 6789</span></p>
        <p>We’re happy to assist you with bookings, inquiries, or feedback about our services.</p>
      </div>

      <form action="#" method="post" class="bg-white shadow-md rounded-lg p-8">
        <div class="mb-4">
          <label class="block font-medium mb-2">Name</label>
          <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
        </div>
        <div class="mb-4">
          <label class="block font-medium mb-2">Email</label>
          <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
        </div>
        <div class="mb-4">
          <label class="block font-medium mb-2">Message</label>
          <textarea name="message" rows="4" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Send Message</button>
      </form>
    </div>
  </main>

  <?php include("php_includes/footer.php"); ?>

</body>
</html>
