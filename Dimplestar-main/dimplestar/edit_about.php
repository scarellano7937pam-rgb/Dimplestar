<?php
session_start();
include('config.php');

// Check if logged in and is superadmin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'superadmin') {
    header('Location: login.php');
    exit;
}

$error = '';
$success = '';

// Get current content
$sql = "SELECT content FROM about_content WHERE id = 1";
$result = $conn->query($sql);
$currentContent = $result && $result->num_rows > 0 ? $result->fetch_assoc()['content'] : '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newContent = trim($_POST['content']);

    if ($newContent === '') {
        $error = "Content cannot be empty.";
    } else {
        if ($result && $result->num_rows > 0) {
            // Update existing
            $stmt = $conn->prepare("UPDATE about_content SET content = ? WHERE id = 1");
        } else {
            // Insert new
            $stmt = $conn->prepare("INSERT INTO about_content (id, content) VALUES (1, ?)");
        }
        $stmt->bind_param("s", $newContent);
        if ($stmt->execute()) {
            $success = "Content updated successfully!";
            $currentContent = $newContent;
        } else {
            $error = "Database error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Edit About Page</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<main class="container mx-auto px-6 pt-20 max-w-3xl">
    <h1 class="text-3xl font-bold text-blue-600 mb-6">Edit About Page</h1>

    <?php if ($error): ?>
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="post">
        <textarea name="content" rows="10" class="w-full border rounded p-4 focus:ring-2 focus:ring-blue-600" required><?= htmlspecialchars($currentContent) ?></textarea>
        <button type="submit" class="mt-4 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Changes</button>
    </form>

    <a href="dashboard.php" class="inline-block mt-6 text-blue-600 hover:underline">Back to Dashboard</a>
</main>

</body>
</html>
