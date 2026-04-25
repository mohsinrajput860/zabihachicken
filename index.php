<?php 
include_once 'config/config.php'; 
include 'includes/header.php'; 

// Load banner images
global $base_url;
$banner_dir = __DIR__ . '/assets/images/banners/';
$banner_url = $base_url . 'assets/images/banners/';
$banner_images = [];

foreach (glob($banner_dir . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE) as $imgPath) {
    $banner_images[] = $banner_url . basename($imgPath);
}
?>

<!-- Hero Section -->
<section class="hero-section text-white d-flex align-items-center justify-content-center text-center" id="heroSection">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1 class="fw-bold display-4">Best American Restaurant in Town</h1>
    <p class="lead">Flavor That Runs Deep — From Our Family to Yours</p>
    <a href="<?= $base_url ?>order.php" class="btn btn-danger mt-3 fw-bold">Order Online</a>
  </div>
</section>

<!-- Popular Items Section -->
<section class="bg-black text-white py-5 text-center">
  <div class="container">
    <h2 class="fw-bold mb-3">Try our most popular items</h2>
    <a href="<?= $base_url ?>menu.php" class="btn btn-danger mb-4">View Full Menu</a>

    <!-- Carousel wrapper -->
    <div class="carousel-wrapper">
      <div class="carousel" id="carousel">
        <?php
        $menuItems = [
          ['name' => 'Double Crispy Chicken Sandwich', 'desc' => '2 Hand Breaded Chicken Breasts with Moe Sauce', 'img' => 'assets/images/menu-items/double-crispy-chicken-sandwich.png'],
          ['name' => 'Double Chicken Fire Burger', 'desc' => 'Spicy Ground Chicken Topped W/ Lettuce', 'img' => 'assets/images/menu-items/double-chicken-fire-burger.png'],
          ['name' => 'Honey Butter Crispy Chicken', 'desc' => 'Chicken Dipped in Honey Butter', 'img' => 'assets/images/menu-items/honey-butter-crispy-chicken.png'],
          ['name' => 'Big Moe', 'desc' => '1/3lb Grass Fed Beef W/ Grilled Onions', 'img' => 'assets/images/menu-items/big-moe.png'],
        ];

        $itemsToShow = array_merge($menuItems, $menuItems);

        foreach ($itemsToShow as $item): ?>
          <div class="card bg-dark text-white item-card">
            <img src="<?= $base_url . $item['img'] ?>" class="card-img-top" alt="<?= $item['name'] ?>" style="height: 150px; object-fit: cover;">
            <div class="card-body bg-secondary">
              <h5 class="card-title"><?= $item['name'] ?></h5>
              <p class="card-text small"><?= $item['desc'] ?></p>
              <button class="btn btn-outline-light btn-sm w-100">Add Item</button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Halal Full-Width Image Section -->
<section class="halal-image-section">
  <img src="<?= $base_url ?>assets/images/halal.jpg" alt="Halal Certified">
</section>

<?php include 'includes/footer.php'; ?>

<!-- Custom styles -->
<style>
.hero-section {
  height: 90vh;
  background-size: cover;
  background-position: center;
  position: relative;
  transition: background-image 1s ease-in-out;
}

.hero-overlay {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
}

/* Carousel styles */
.carousel-wrapper {
  overflow: hidden;
  position: relative;
}

.carousel {
  display: flex;
  gap: 1rem;
  animation: scrollLeft 20s linear infinite;
  will-change: transform;
}

.item-card {
  min-width: 200px;
  flex-shrink: 0;
}

/* Halal image section */
.halal-image-section {
  background-color: #000;
  padding: 20px 0;
  text-align: center;
}

.halal-image-section img {
  width: 100%;
  max-height: 500px; /* Height barha di */
  object-fit: cover;
  display: block;
}

/* Keyframes to scroll items right to left */
@keyframes scrollLeft {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}
</style>

<!-- JS for Hero Banner slideshow -->
<script>
  const hero = document.getElementById('heroSection');
  const bannerImages = <?= json_encode($banner_images) ?>;
  let current = 0;

  function changeBanner() {
    if (bannerImages.length === 0) return;
    hero.style.backgroundImage = `url('${bannerImages[current]}')`;
    current = (current + 1) % bannerImages.length;
  }

  changeBanner(); // initial call
  setInterval(changeBanner, 5000); // change every 5 seconds
</script>
