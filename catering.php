<?php include_once(__DIR__ . '/includes/header.php'); ?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');

  body {
    background-color: #000000; /* pure black background */
    font-family: 'Roboto Condensed', sans-serif;
  }

  .container.py-5 {
    background-color: #111111; /* very dark container background */
    border-radius: 15px;
    padding: 3rem 2rem;
    max-width: 900px;
    color: #fff;
    margin-top: 3rem;
    margin-bottom: 3rem;
  }

  h2.display-5 {
    color: #FF4500; /* red headings */
    font-weight: 700;
  }

  /* Labels white */
  label,
  .form-check-label {
    color: #FFFFFF;
    font-weight: 600;
  }

  p, textarea, select, input {
    color: #FFFFFF;
  }

  .form-control,
  .form-select,
  textarea {
    background-color: #222222;
    border: 1px solid #888888; /* gray border */
    color: #FFFFFF;
    box-shadow: none;
    font-family: 'Roboto Condensed', sans-serif;
    transition: border-color 0.3s ease;
  }

  .form-control::placeholder,
  textarea::placeholder {
    color: #888888; /* gray placeholder */
  }

  .form-control:focus,
  .form-select:focus,
  textarea:focus {
    border-color: #666666; /* darker gray on focus */
    box-shadow: 0 0 0 0.25rem rgba(102, 102, 102, 0.4);
    background-color: #222222;
    color: #fff;
  }

  .btn-danger {
    background-color: #FF4500;
    border: none;
    font-weight: 700;
    font-family: 'Roboto Condensed', sans-serif;
  }

  .btn-danger:hover {
    background-color: #cc3700;
  }

  .text-danger {
    color: #FF4500 !important;
  }

  .form-check-input {
    background-color: #222222;
    border-color: #888888; /* gray border */
  }

  .form-check-input:checked {
    background-color: #FF4500;
    border-color: #FF4500;
  }

  @media (max-width: 767px) {
    .container.py-5 {
      padding: 2rem 1rem;
    }
  }
</style>

<!-- Catering Page -->
<div class="container py-5">
  <div class="row align-items-start">
    <!-- Left Info Text -->
    <div class="col-md-4 mb-4">
      <h2 class="display-5 fw-bold">Catering</h2>
      <p>Please complete the form below to send us a catering request. We’ll get back to you shortly.</p>
    </div>

    <!-- Right Form -->
    <div class="col-md-8">
      <form method="post" action="" class="row g-4">
        <div class="col-md-6">
          <label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
        </div>

        <div class="col-md-6">
          <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <div class="col-md-6">
          <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
          <input type="tel" id="phone" name="phone" class="form-control" placeholder="e.g. (555) 555-5555" required>
        </div>

        <div class="col-md-3">
          <label class="form-label" for="date">Date <span class="text-danger">*</span></label>
          <input type="date" id="date" name="date" class="form-control" required>
        </div>

        <div class="col-md-3">
          <label class="form-label" for="time">Time <span class="text-danger">*</span></label>
          <input type="time" id="time" name="time" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label" for="people">Number of people you are catering for <span class="text-danger">*</span></label>
          <select id="people" name="people" class="form-select" required>
            <option value="">Select...</option>
            <option value="1-9">1-9</option>
            <option value="10-19">10-19</option>
            <option value="20-29">20-29</option>
            <option value="30-39">30-39</option>
            <option value="40-49">40-49</option>
            <option value="50+">50+</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Delivery or Pickup <span class="text-danger">*</span></label>
          <div class="d-flex gap-4 pt-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="method" id="delivery" value="Delivery" required>
              <label class="form-check-label" for="delivery">Delivery</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="method" id="pickup" value="Pickup" required>
              <label class="form-check-label" for="pickup">Pickup</label>
            </div>
          </div>
        </div>

        <div class="col-12">
          <label class="form-label" for="details">Additional Details</label>
          <textarea id="details" name="details" class="form-control" rows="4" placeholder="Special instructions, menu preferences, etc."></textarea>
        </div>

        <div class="col-12 text-center">
          <button type="submit" class="btn btn-danger px-4">Send Catering Request</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once(__DIR__ . '/includes/footer.php'); ?>
