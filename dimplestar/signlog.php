<?php
session_start();
include("config.php");  // your database connection

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Basic validation
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } elseif (empty($name)) {
        $error = "Name is required.";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Email is already registered.";
        } else {
            $stmt->close();

            // Hash the password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password_hash);

            if ($stmt->execute()) {
                // Redirect to login page after successful signup
                header("Location: login.php");
                exit();
            } else {
                $error = "Something went wrong. Please try again.";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dimplestar - Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <?php include("php_includes/navbar.php"); ?>

  <main class="flex items-center justify-center min-h-screen pt-20">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
      <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Create an Account</h1>

      <?php if ($error): ?>
        <div class="bg-red-100 text-red-700 p-3 mb-6 rounded">
          <?= htmlspecialchars($error) ?>
        </div>
      <?php endif; ?>

      <form action="" method="post" class="space-y-4" novalidate>
        <div>
          <label class="block font-medium mb-2" for="name">Full Name</label>
          <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required />
        </div>
        <div>
          <label class="block font-medium mb-2" for="email">Email</label>
          <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required />
        </div>
        <div>
          <label class="block font-medium mb-2" for="password">Password</label>
          <input type="password" id="password" name="password" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required />
        </div>
        <div>
          <label class="block font-medium mb-2" for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required />
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
