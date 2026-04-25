<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

require_once '../config/config.php'; // Prevent multiple include errors

// Delete Special
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM specials WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: manage_specials.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Specials</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h2>Manage Weekly Specials</h2>
  <a href="add_special.php" class="btn btn-success mb-3">Add New Special</a>
  <table class="table table-dark table-bordered align-middle text-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $stmt = $conn->query("SELECT * FROM specials ORDER BY id DESC");
    while ($row = $stmt->fetch()):
        $imagePath = "../" . $row['image']; // Adjust path relative to this file
        if (!file_exists($imagePath) || empty($row['image'])) {
            $imagePath = "../assets/images/default.jpg"; // Optional: fallback image
        }
    ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td>
          <img src="<?= htmlspecialchars($imagePath) ?>" width="80" height="60" style="object-fit: cover;" alt="Special Image">
        </td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td>
          <a href="edit_special.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this special?')">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
