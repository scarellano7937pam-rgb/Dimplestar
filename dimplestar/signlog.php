<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dimplestar - Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <?php include("php_includes/navbar.php"); ?>

  <main class="flex items-center justify-center min-h-screen pt-20">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
      <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Create an Account</h1>

      <form action="#" method="post" class="space-y-4">
        <div>
          <label class="block font-medium mb-2">Full Name</label>
          <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
        </div>
        <div>
          <label class="block font-medium mb-2">Email</label>
          <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
        </div>
        <div>
          <label class="block font-medium mb-2">Password</label>
          <input type="password" name="password" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
        </div>
        <div>
          <label class="block font-medium mb-2">Confirm Password</label>
          <input type="password" name="confirm_password" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Sign Up</button>
      </form>

      <p class="text-center text-gray-600 mt-6">
        Already have an account? 
        <a href="login.php" class="text-blue-600 font-medium hover:underline">Login</a>
      </p>
    </div>
  </main>

  <?php include("php_includes/footer.php"); ?>

</body>
</html>
