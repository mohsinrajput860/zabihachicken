<?php 
include_once 'config/config.php'; 
include_once 'includes/db.php';  // DB connection using PDO
include 'includes/header.php'; 

// Banner images
$banner_dir = __DIR__ . '/assets/images/banners/';
$banner_url = $base_url . 'assets/images/banners/';
$banner_images = [];

foreach (glob($banner_dir . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE) as $imgPath) {
    $banner_images[] = $banner_url . basename($imgPath);
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Basic validation
    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $phone && $city && $message) {
        try {
            // Correct column names used here
            $stmt = $pdo->prepare("INSERT INTO franchise_requests (full_name, email, phone, city, message, submitted_at) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$name, $email, $phone, $city, $message]);

            $success = "Thank you for applying! We will get back to you soon.";
            // Clear form data after successful submission
            $name = $email = $phone = $city = $message = '';
        } catch (Exception $e) {
            // For debugging, show actual error message (remove in production)
            $error = "Something went wrong while submitting your application. Error: " . $e->getMessage();
        }
    } else {
        $error = "Please fill all fields correctly.";
    }
}
?>

<!-- Hero Section -->
<section class="hero-section text-white d-flex align-items-center justify-content-center text-center" id="heroSection">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1 class="fw-bold display-4">Own a Zabiha Chicken Franchise</h1>
    <p class="lead">Join the leading halal fast-food chain and grow with us!</p>
    <a href="#franchiseForm" class="btn btn-danger mt-3 fw-bold">Apply Now</a>
  </div>
</section>

<!-- About Franchise -->
<section class="bg-black text-white py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-3">Why Choose Zabiha Chicken?</h2>
    <p class="lead">We bring authentic flavors, a proven business model, and strong brand support to help you succeed in the fast-food industry.</p>
  </div>
</section>

<!-- Franchise Benefits -->
<section class="bg-dark text-white py-5">
  <div class="container">
    <h3 class="fw-bold text-center mb-4">Franchise Benefits</h3>
    <div class="row text-center">
      <div class="col-md-4">
        <div class="card bg-secondary text-white p-3">
          <h5>Strong Brand</h5>
          <p>Join a growing halal fast-food chain with loyal customers worldwide.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-secondary text-white p-3">
          <h5>Complete Training</h5>
          <p>We offer comprehensive training and guidance for smooth operations.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-secondary text-white p-3">
          <h5>Marketing Support</h5>
          <p>Benefit from our marketing expertise and brand campaigns.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Franchise Application Form -->
<section class="bg-black text-white py-5" id="franchiseForm">
  <div class="container">
    <h3 class="fw-bold text-center mb-4">Apply for a Franchise</h3>

    <?php if ($success): ?>
      <div class="alert alert-success text-center"><?= htmlspecialchars($success) ?></div>
    <?php elseif ($error): ?>
      <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form class="row g-3" action="" method="POST">
      <div class="col-md-6">
        <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?= htmlspecialchars($name ?? '') ?>" required>
      </div>
      <div class="col-md-6">
        <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?= htmlspecialchars($email ?? '') ?>" required>
      </div>
      <div class="col-md-6">
        <input type="tel" class="form-control" name="phone" placeholder="Phone Number" value="<?= htmlspecialchars($phone ?? '') ?>" required>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="city" placeholder="City/Location" value="<?= htmlspecialchars($city ?? '') ?>" required>
      </div>
      <div class="col-12">
        <textarea class="form-control" name="message" rows="4" placeholder="Why do you want a Zabiha Chicken franchise?" required><?= htmlspecialchars($message ?? '') ?></textarea>
      </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-danger fw-bold px-4">Submit Application</button>
      </div>
    </form>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- Custom Page Styles -->
<style>
.hero-section {
  height: 80vh;
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
.hero-content { position: relative; z-index: 2; }

/* Cards */
.card { border: none; border-radius: 10px; }

/* Form */
.form-control { background-color: #222; border: 1px solid #444; color: #fff; }
.form-control::placeholder { color: #aaa; }
</style>

<!-- Hero Banner Slideshow -->
<script>
  const hero = document.getElementById('heroSection');
  const bannerImages = <?= json_encode($banner_images) ?>;
  let current = 0;

  function changeBanner() {
    if (bannerImages.length === 0) return;
    hero.style.backgroundImage = `url('${bannerImages[current]}')`;
    current = (current + 1) % bannerImages.length;
  }

  changeBanner(); 
  setInterval(changeBanner, 5000); 
</script>
