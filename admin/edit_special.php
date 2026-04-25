<?php
include '../config/config.php';
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM specials WHERE id = ?");
$stmt->execute([$id]);
$special = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $image = $_POST['image'];

    $update = $conn->prepare("UPDATE specials SET title = ?, description = ?, image = ? WHERE id = ?");
    $update->execute([$title, $desc, $image, $id]);
    header("Location: manage_specials.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Special</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h2>Edit Weekly Special</h2>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="<?= $special['title'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" required><?= $special['description'] ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Image Path</label>
      <input type="text" name="image" class="form-control" value="<?= $special['image'] ?>" required>
    </div>
    <button type="submit" class="btn btn-warning">Update Special</button>
  </form>
</div>
</body>
</html>
