<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

include_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Zabiha Chicken</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #0d0d0d, #1a1a1a);
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
    }

    .dashboard-box {
      background: #1c1c1c;
      border-radius: 15px;
      padding: 40px;
      box-shadow: 0 0 20px rgba(255, 0, 0, 0.1);
      animation: fadeInUp 0.7s ease-in-out;
    }

    .dashboard-box h2 {
      font-weight: bold;
      font-size: 2rem;
    }

    .btn-panel {
      background-color: #dc3545;
      color: #fff;
      font-weight: bold;
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-panel:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(40px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 576px) {
      .dashboard-box {
        padding: 25px;
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
  <span class="navbar-brand mb-0 h1"><i class="fas fa-user-shield me-2"></i>Admin Panel - Zabiha Chicken</span>
  <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
</nav>

<div class="container my-5">
  <div class="dashboard-box text-center">
    <h2>Welcome, <?= htmlspecialchars($_SESSION['admin_username']) ?> 👋</h2>
    <p class="text-muted mt-2">Manage your site content with ease.</p>

    <hr class="border-secondary my-4" />

    <div class="row g-4">
      <div class="col-md-4 col-sm-6">
        <a href="manage_menu.php" class="btn-panel d-block"><i class="fas fa-utensils me-2"></i>Manage Menu</a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="manage_specials.php" class="btn-panel d-block"><i class="fas fa-star me-2"></i>Manage Specials</a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="manage_jobs.php" class="btn-panel d-block"><i class="fas fa-briefcase me-2"></i>Manage Jobs</a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="manage_story.php" class="btn-panel d-block"><i class="fas fa-book-open me-2"></i>Manage Our Story</a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="manage_orders.php" class="btn-panel d-block"><i class="fas fa-receipt me-2"></i>Manage Orders</a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="site_settings.php" class="btn-panel d-block"><i class="fas fa-cogs me-2"></i>Site Settings</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
