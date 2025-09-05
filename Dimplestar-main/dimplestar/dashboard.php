<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// You can access session variables like this:
$name = $_SESSION['name'] ?? 'User';
$email = $_SESSION['email'] ?? '';
$role = $_SESSION['user_role'] ?? 'user';  // <-- Add role from session
// For Member Since, you can either store date at registration or leave static for now.
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dimplestar - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <?php include("php_includes/navbar.php"); ?>

  <main class="container mx-auto px-6 pt-28">
    <h1 class="text-4xl font-bold text-blue-600 mb-6">Welcome, <?= htmlspecialchars($name) ?>!</h1>

    <div class="grid md:grid-cols-3 gap-8">
      <!-- Profile Section -->
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">My Profile</h2>
        <p><span class="font-medium">Name:</span> <?= htmlspecialchars($name) ?></p>
        <p><span class="font-medium">Email:</span> <?= htmlspecialchars($email) ?></p>
        <p><span class="font-medium">Member Since:</span> Jan 2025</p>
        <a href="#" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Edit Profile</a>

        <?php if ($role === 'superadmin'): ?>
          <a href="edit_about.php" class="inline-block mt-4 bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Edit About Page
          </a>
        <?php endif; ?>
      </div>

      <!-- Bookings Section -->
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">My Bookings</h2>
        <ul class="space-y-3">
          <li class="border-b pb-2">
            <p><span class="font-medium">Route:</span> Manila - Baguio</p>
            <p><span class="font-medium">Date:</span> Sept 15, 2025</p>
          </li>
          <li class="border-b pb-2">
            <p><span class="font-medium">Route:</span> Pampanga - Baguio</p>
            <p><span class="font-medium">Date:</span> Sept 20, 2025</p>
          </li>
        </ul>
        <a href="book.php" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Book New Trip</a>
      </div>

      <!-- Support Section -->
      <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Support</h2>
        <p>If you need help, contact our support team anytime.</p>
        <a href="contact.php" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Contact Support</a>
      </div>
    </div>

    <div class="mt-12 text-center">
      <a href="logout.php" class="inline-block bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700">Logout</a>
    </div>
  </main>

  <?php include("php_includes/footer.php"); ?>

</body>
</html>
