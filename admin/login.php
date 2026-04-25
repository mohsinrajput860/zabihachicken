<?php
session_start();
require_once '../config/config.php'; // use require_once to avoid re-defining constants or connection

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // You can hash and verify password like below if needed:
    // $stmt = $conn->prepare("SELECT * FROM admin WHERE username = :username LIMIT 1");

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = :username AND password = :password LIMIT 1");
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $user['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container" style="max-width: 400px; margin-top: 100px;">
  <h3 class="mb-4 text-center">Admin Login</h3>
  <?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="POST">
    <div class="mb-3">
      <label>Email</label>
      <input type="text" name="email" class="form-control" required placeholder="Enter admin email">
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-danger w-100">Login</button>
  </form>
</div>

</body>
</html>
