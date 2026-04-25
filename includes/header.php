<?php
// Include global config
include_once(__DIR__ . '/../config/config.php');

// Optional: SEO meta defaults
$meta_title = $meta_title ?? 'Zabiha Chicken - Fresh, Halal, and Delicious';
$meta_description = $meta_description ?? 'Zabiha Chicken offers premium halal meals including fried chicken, grilled wraps, and family specials. 100% hand-slaughtered and zabiha halal.';
$meta_keywords = $meta_keywords ?? 'Zabiha Chicken, Halal Chicken, Halal Food, Fried Chicken, Halal Catering';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- SEO Meta Tags -->
  <title><?= htmlspecialchars($meta_title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($meta_description) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($meta_keywords) ?>">
  <meta name="author" content="Zabiha Chicken">

  <!-- Open Graph Tags -->
  <meta property="og:title" content="<?= htmlspecialchars($meta_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($meta_description) ?>">
  <meta property="og:image" content="<?= $base_url ?>assets/images/Zabiha-Chicken.png">
  <meta property="og:url" content="<?= $base_url . basename($_SERVER['REQUEST_URI']) ?>">
  <meta property="og:type" content="website">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="<?= $base_url ?>assets/css/style.css" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" href="<?= $base_url ?>assets/images/Zabiha-Chicken.png" type="image/png">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="<?= $base_url ?>">
      <img src="<?= $base_url ?>assets/images/Zabiha-Chicken.png" alt="Logo" width="60" class="me-2" />
      <strong>Zabiha Chicken</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold">
        <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url ?>menu.php">Menu</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url ?>specials.php">Specials</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url ?>catering.php">Catering</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url ?>story.php">Our Story</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url ?>careers.php">We're Hiring</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="<?= $base_url ?>gift-cards.php">Gift Cards</a></li>
            <li><a class="dropdown-item" href="<?= $base_url ?>contact.php">Contact Us</a></li>
            <li><a class="dropdown-item" href="<?= $base_url ?>want-a-franchis.php">Want a Franchis</a></li>
          </ul>
        </li>
      </ul>
      <div class="d-flex gap-2 ms-3">
        <a href="<?= $base_url ?>signin.php" class="btn btn-outline-light btn-sm">Sign In</a>
        <a href="<?= $base_url ?>order.php" class="btn btn-danger btn-sm">Order Online</a>
      </div>
    </div>
  </div>
</nav>
