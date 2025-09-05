<?php
session_start();
include 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prepare and execute query to fetch user by email
    $stmt = $conn->prepare("SELECT id, name, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // No password hashing as requested — direct compare
        if ($password === $user['password']) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] === 'superadmin') {
                header("Location: superadmin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Dimplestar - Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<?php include("php_includes/navbar.php"); ?>

<main class="flex items-center justify-center min-h-screen pt-20">
  <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Login</h1>

    <?php if ($error): ?>
      <div class="mb-4 text-red-600 font-semibold"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="login.php" method="post" class="space-y-4">
      <div>
        <label class="block font-medium mb-2">Email</label>
        <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
      </div>
      <div>
        <label class="block font-medium mb-2">Password</label>
        <input type="password" name="password" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-600" required>
      </div>
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Login</button>
    </form>

    <p class="text-center text-gray-600 mt-6">
      Don’t have an account? 
      <a href="signlog.php" class="text-blue-600 font-medium hover:underline">Sign Up</a>
    </p>
  </div>
</main>

<?php include("php_includes/footer.php"); ?>

</body>
</html>
