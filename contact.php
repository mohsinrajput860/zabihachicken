<?php include_once(__DIR__ . '/includes/header.php'); ?>

<style>
  body, html {
    background-color: #000000; /* Full black background */
    color: #ffffff;
  }
  .container.py-5 {
    background-color: #000000; /* Full black container */
    border-radius: 15px;
    padding-top: 3rem;
    padding-bottom: 3rem;
  }
  form.mx-auto.p-4.shadow {
    max-width: 600px;
    background-color: #111111; /* Very dark near-black form background */
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.05);
  }
  .form-control {
    background-color: #000000 !important; /* Full black input background */
    color: #ffffff !important;
    border: 1px solid #444444 !important;
    box-shadow: none !important;
  }
  .form-control::placeholder {
    color: #777777 !important;
  }
  .form-control:focus {
    background-color: #111111 !important;
    border-color: #dc3545 !important; /* Red focus border */
    color: #fff !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5) !important;
  }
  .form-label {
    font-weight: 600;
    color: #ffffff;
  }
  .btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    font-weight: 700;
  }
  .btn-danger:hover, .btn-danger:focus {
    background-color: #bb2d3b;
    border-color: #aa2a37;
  }
</style>

<div class="container py-5">
  <h2 class="text-center mb-4">Get In Touch</h2>

  <form class="mx-auto p-4 shadow" method="post" style="max-width: 600px;">
    <!-- Full Name -->
    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" id="name" name="name" class="form-control" placeholder="Your name" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="you@example.com" required>
    </div>

    <!-- Message -->
    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea id="message" name="message" class="form-control" rows="4" placeholder="Your message..." required></textarea>
    </div>

    <!-- Submit -->
    <div class="d-grid">
      <button type="submit" class="btn btn-danger py-2 fw-bold">Send Message</button>
    </div>
  </form>
</div>

<?php include_once(__DIR__ . '/includes/footer.php'); ?>
