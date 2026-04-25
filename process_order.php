<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $type = $_POST['orderType'];
  $location = $_POST['location'];
  $address = $_POST['delivery_address'] ?? 'N/A';
  $unit = $_POST['unit_number'] ?? 'N/A';

  // Save in DB or send via email
  // For now just echo confirmation
  echo "Order received for $type at $location!";
}
?>
