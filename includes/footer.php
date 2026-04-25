<?php
// Include global config
include_once(__DIR__ . '/../config/config.php');
?>

<!-- Footer -->
<footer class="bg-dark text-white mt-5 pt-4 pb-3">
  <div class="container">
    <div class="row text-center text-md-start">
      
      <!-- Logo and Copy -->
      <div class="col-md-3 mb-4">
        <img src="<?= $base_url ?>assets/images/Zabiha-Chicken.jpg" alt="Logo" width="80">
        <p class="small mt-2">Zabiha Chicken LLC © 2025<br>All Rights Reserved</p>
      </div>

      <!-- Explore -->
      <div class="col-md-2 mb-3">
        <h6 class="fw-bold mb-3">Explore</h6>
        <a href="<?= $base_url ?>index.php" class="d-block text-white text-decoration-none mb-1">Home</a>
        <a href="<?= $base_url ?>catering.php" class="d-block text-white text-decoration-none mb-1">Catering</a>
        <a href="<?= $base_url ?>gift-cards.php" class="d-block text-white text-decoration-none">Gift Cards</a>
      </div>

      <!-- Company -->
      <div class="col-md-2 mb-3">
        <h6 class="fw-bold mb-3">Company</h6>
        <a href="<?= $base_url ?>menu.php" class="d-block text-white text-decoration-none mb-1">Menu</a>
        <a href="<?= $base_url ?>story.php" class="d-block text-white text-decoration-none mb-1">Our Story</a>
        <a href="<?= $base_url ?>contact.php" class="d-block text-white text-decoration-none">Contact Us</a>
      </div>

      <!-- Jobs -->
      <div class="col-md-2 mb-3">
        <h6 class="fw-bold mb-3">Jobs</h6>
        <a href="<?= $base_url ?>specials.php" class="d-block text-white text-decoration-none mb-1">Specials</a>
        <a href="<?= $base_url ?>careers.php" class="d-block text-white text-decoration-none">We're Hiring</a>
      </div>

      <!-- CTA and Social -->
      <div class="col-md-3 text-center text-md-start">
        <a href="<?= $base_url ?>order-now.php" class="btn btn-danger btn-sm mb-3 px-4">Order Now</a>
        <div class="mt-2">
          <a href="https://facebook.com" class="text-white me-3 fs-5" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="https://instagram.com" class="text-white fs-5" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <hr class="border-white border-opacity-25 my-3" />

    <!-- Bottom links -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-center">
      <div class="mb-2 mb-md-0">
        <a href="<?= $base_url ?>terms.php" class="text-white me-3 text-decoration-none">Terms & Policies</a>
        <a href="<?= $base_url ?>accessibility.php" class="text-white text-decoration-none">Accessibility</a>
      </div>
      <div>
        <a href="https://owner.com" target="_blank" class="btn btn-outline-light btn-sm rounded-pill">Made with Owner</a>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optional: Auto-scroll script for menu page only -->
<script>
  try {
    const scrollRef = document.getElementById('menuScroll');
    if (scrollRef) {
      setInterval(() => scrollRef.scrollLeft -= 1, 30);
    }
  } catch (err) {
    console.warn("Scroll script error:", err);
  }
</script>

</body>
</html>
