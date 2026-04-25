<?php
include '../config/config.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    // Handle image upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        $fileName = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . time() . '_' . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = str_replace('../', '', $targetFile); // Store relative path like uploads/image.jpg
        }
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO specials (title, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$title, $desc, $imagePath]);

    header("Location: manage_specials.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Special</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h2>Add New Weekly Special</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Upload Image</label>
      <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-success">Add Special</button>
  </form>
</div>
</body>
</html>
