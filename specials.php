<?php include 'includes/header.php'; ?>
<?php require_once 'config/config.php'; ?>

<section class="bg-dark text-white py-5">
  <div class="container">
    <h1 class="text-center mb-5">Weekly Specials</h1>

    <div class="row g-4">
      <?php
      try {
          $stmt = $conn->query("SELECT * FROM specials ORDER BY id DESC");

          if ($stmt->rowCount() === 0) {
              echo '<p class="text-center">No specials available right now.</p>';
          } else {
              while ($sp = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                  <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                      <img src="<?= htmlspecialchars($sp['image']) ?: 'images/default.jpg' ?>"
                           class="card-img-top"
                           alt="<?= htmlspecialchars($sp['title']) ?>"
                           style="height:250px; object-fit:cover;">
                      <div class="card-body text-center">
                        <h5 class="card-title fw-bold"><?= htmlspecialchars($sp['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($sp['description']) ?></p>
                      </div>
                    </div>
                  </div>
              <?php endwhile;
          }
      } catch (PDOException $e) {
          echo '<div class="alert alert-danger">Error loading specials: ' . htmlspecialchars($e->getMessage()) . '</div>';
      }
      ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
