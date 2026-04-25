<?php
// functions.php

// Base URL (auto-detect from server or set manually)
function base_url($path = '') {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
  $domain = $_SERVER['HTTP_HOST'];
  $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
  return $protocol . $domain . $base . '/' . ltrim($path, '/');
}

// Load assets dynamically
function asset($file) {
  return base_url('assets/' . $file);
}

// Current Page Name
function currentPage() {
  return basename($_SERVER['PHP_SELF']);
}

// Active Class for Menu
function isActive($page) {
  return currentPage() === $page ? 'active' : '';
}

// Example: Render Menu Items (if you want central nav)
function render_menu() {
  $menu = [
    'index.php' => 'Home',
    'menu.php' => 'Menu',
    'specials.php' => 'Specials',
    'catering.php' => 'Catering',
    'contact.php' => 'Contact',
    'order.php' => 'Order Online',
  ];

  foreach ($menu as $file => $label) {
    $active = isActive($file);
    echo "<li class='nav-item'><a class='nav-link $active' href='$file'>$label</a></li>";
  }
}
