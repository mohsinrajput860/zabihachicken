<?php include_once(__DIR__ . '/includes/header.php'); ?>

<style>
  html, body {
    background-color: #000000; /* full black background */
    color: #ffffff;
  }

  .card.bg-dark {
    background-color: #111111 !important; /* very dark card background */
    border: none;
  }

  .form-control.bg-secondary {
    background-color: #222222 !important; /* dark input backgrounds */
    color: #ffffff !important;
    border: 1px solid #555 !important;
    box-shadow: none !important;
  }

  .form-control.bg-secondary::placeholder {
    color: #aaa !important;
  }

  .form-control.bg-secondary:focus {
    background-color: #333333 !important;
    border-color: #ffc107 !important; /* bootstrap warning color */
    color: #fff !important;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25) !important;
  }

  .form-label {
    font-weight: 600;
  }

  /* Override file input bg-dark */
  input[type="file"].bg-dark {
    background-color: #222222 !important;
    color: #fff !important;
    border: 1px solid #555 !important;
  }

  /* Radio inputs with warning color */
  .form-check-input.bg-warning {
    background-color: #ffc107 !important;
    border-color: #ffc107 !important;
  }

  .form-check-label {
    color: #fff;
  }

  /* Button styling */
  .btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #000;
    font-weight: 700;
    transition: background-color 0.3s ease;
  }

  .btn-warning:hover,
  .btn-warning:focus {
    background-color: #e0a800;
    border-color: #d39e00;
    color: #000;
  }
</style>

<div class="container py-5">
  <h1 class="text-center mb-4 text-white fw-bold">Join Our Team</h1>
  <p class="text-center mb-5 text-white">
    Be part of a passionate crew committed to great food and service.
  </p>

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card bg-dark text-white shadow-lg p-4 rounded-4 border-0">
        <h4 class="mb-3 text-warning">Why Work With Zabiha Chickens?</h4>
        <p class="text-light">
          We're always on the lookout for driven, customer-focused individuals who value quality work and teamwork. 
          Complete this short form and share your resume—let’s grow together!
        </p>

        <!-- Preferred Location -->
        <div class="mb-4">
          <label class="form-label text-warning">Select Preferred Location <span class="text-danger">*</span></label>
          <div class="d-flex gap-4 pt-2">
            <div class="form-check">
              <input class="form-check-input bg-warning border-warning" type="radio" name="location" id="location1" value="Zabiha Chickens Express" required>
              <label class="form-check-label text-white" for="location1">
                Zabiha Chickens Express – 9745 Liberia Ave
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input bg-warning border-warning" type="radio" name="location" id="location2" value="Zabiha Chickens - DC">
              <label class="form-check-label text-white" for="location2">
                Zabiha Chickens - DC – 3728 Georgia Ave NW
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input bg-warning border-warning" type="radio" name="location" id="location3" value="Zabiha Chickens - Woodbridge">
              <label class="form-check-label text-white" for="location3">
                Zabiha Chickens - Woodbridge – 14845 Buildamerica Dr
              </label>
            </div>
          </div>
        </div>

        <!-- Application Form -->
        <form method="post" action="" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label text-white">Full Name</label>
            <input type="text" class="form-control bg-secondary text-white border-0 shadow-sm" id="name" name="name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label text-white">Email Address</label>
            <input type="email" class="form-control bg-secondary text-white border-0 shadow-sm" id="email" name="email" required>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label text-white">Phone Number</label>
            <input type="tel" class="form-control bg-secondary text-white border-0 shadow-sm" id="phone" name="phone" placeholder="(555) 555-5555" required>
          </div>

          <div class="mb-3">
            <label for="message" class="form-label text-white">Tell Us About Yourself</label>
            <textarea class="form-control bg-secondary text-white border-0 shadow-sm" id="message" name="message" rows="4" placeholder="Any experience or message you'd like to share?"></textarea>
          </div>

          <div class="mb-4">
            <label for="resume" class="form-label text-white">Upload Resume / Cover Letter (PDF only)</label>
            <input class="form-control bg-dark text-white border-0" type="file" id="resume" name="resume" accept=".pdf">
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-warning btn-lg fw-bold">Submit Application</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php include_once(__DIR__ . '/includes/footer.php'); ?>
