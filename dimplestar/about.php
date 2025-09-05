<?php
include "config.php";

$sql = "SELECT content FROM about_content WHERE id = 1 LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$content = $row['content'] ?? "No content found.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>About Us</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<?php include("php_includes/navbar.php"); ?>

<main class="container mx-auto px-6 pt-28">
  <h1 class="text-4xl font-bold text-blue-600 mb-6">About Us</h1>
  <div class="prose max-w-none">
    <?= $content ?>
  </div>
</main>

<?php include("php_includes/footer.php"); ?>

</body>
</html>
