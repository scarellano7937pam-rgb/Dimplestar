<?php
session_start();
include "config.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'superadmin') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];

// Fetch current about content
$sql = "SELECT * FROM about_content WHERE id = 1 LIMIT 1";
$result = $conn->query($sql);
$about = $result->fetch_assoc();
$old_content = $about['content'] ?? '';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_content = $_POST['about_content'] ?? '';

    if ($new_content !== $old_content) {
        $stmt = $conn->prepare("UPDATE about_content SET content = ?, updated_at = NOW(), updated_by = ? WHERE id = 1");
        $stmt->bind_param("si", $new_content, $user_id);
        $stmt->execute();

        $action = "Updated About page content";
        $stmt2 = $conn->prepare("INSERT INTO audit_trail (user_id, action, old_content, new_content) VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("isss", $user_id, $action, $old_content, $new_content);
        $stmt2->execute();

        $message = "About page updated successfully.";
        $old_content = $new_content;
    } else {
        $message = "No changes detected.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Superadmin - Edit About Page</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<nav class="bg-white shadow-md fixed w-full top-0 z-50">
  <div class="container mx-auto flex justify-between items-center px-6 py-4">
    <a href="dashboard.php" class="text-2xl font-bold text-blue-600">Superadmin Panel</a>
    <div class="space-x-4">
      <span class="font-semibold text-gray-700">Hello, <?=htmlspecialchars($user_name)?></span>
      <a href="logout.php" class="text-red-600 hover:underline">Logout</a>
    </div>
  </div>
</nav>

<main class="container mx-auto pt-28 px-6">
  <h1 class="text-3xl font-bold mb-6 text-blue-600">Edit About Page Content</h1>

  <?php if ($message): ?>
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded"><?=htmlspecialchars($message)?></div>
  <?php endif; ?>

  <form method="post" class="mb-12">
    <textarea name="about_content" rows="10" class="w-full p-4 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required><?=htmlspecialchars($old_content)?></textarea>
    <button type="submit" class="mt-4 bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Changes</button>
  </form>

  <h2 class="text-2xl font-semibold mb-4">Audit Trail</h2>
  <div class="overflow-x-auto bg-white shadow rounded p-4 max-h-96 overflow-y-auto">
    <table class="min-w-full text-left text-sm">
      <thead class="border-b border-gray-300">
        <tr>
          <th class="py-2 px-3">Time</th>
          <th class="py-2 px-3">User</th>
          <th class="py-2 px-3">Action</th>
          <th class="py-2 px-3">Old Content</th>
          <th class="py-2 px-3">New Content</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $audit_sql = "SELECT audit_trail.*, users.name FROM audit_trail LEFT JOIN users ON audit_trail.user_id = users.id ORDER BY changed_at DESC LIMIT 10";
        $audit_result = $conn->query($audit_sql);
        if ($audit_result->num_rows > 0):
          while ($row = $audit_result->fetch_assoc()):
        ?>
          <tr class="border-b border-gray-200">
            <td class="py-2 px-3"><?=htmlspecialchars($row['changed_at'])?></td>
            <td class="py-2 px-3"><?=htmlspecialchars($row['name'])?></td>
            <td class="py-2 px-3"><?=htmlspecialchars($row['action'])?></td>
            <td class="py-2 px-3 whitespace-pre-wrap max-w-xs overflow-auto"><?=htmlspecialchars($row['old_content'])?></td>
            <td class="py-2 px-3 whitespace-pre-wrap max-w-xs overflow-auto"><?=htmlspecialchars($row['new_content'])?></td>
          </tr>
        <?php
          endwhile;
        else:
        ?>
          <tr>
            <td colspan="5" class="text-center py-4 text-gray-500">No audit logs found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>

</body>
</html>
