<?php include_once(__DIR__ . '/includes/header.php'); ?>

<style>
  html, body {
    background-color: #000000; /* full black background */
    color: #ffffff;
  }

  .card.bg-dark-gray {
    background-color: #111111; /* near black for card backgrounds */
    border: none;
    color: #ffffff;
  }

  .form-control,
  .form-select {
    background-color: #222222; /* dark inputs */
    color: #ffffff;
    border: 1px solid #555;
    transition: all 0.2s ease-in-out;
  }

  .form-control::placeholder {
    color: #aaa;
  }

  .form-control:focus,
  .form-select:focus {
    border-color: #888;
    box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1);
    background-color: #333333;
  }

  .form-label {
    font-weight: 600;
  }

  .btn-outline-light {
    border-color: #bbb;
    color: #fff;
    transition: all 0.2s ease-in-out;
  }

  .btn-outline-light:hover,
  .btn-outline-light:focus {
    background-color: #555;
    border-color: #888;
    color: #fff;
  }

  .btn-outline-light.active {
    background-color: #444;
    border-color: #999;
    color: #fff;
  }
</style>

<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold text-white">🎁 Gift the Perfect Card</h2>

  <div class="d-flex justify-content-center mb-4">
    <a href="?view=buy" class="btn <?= ($_GET['view'] ?? 'buy') === 'buy' ? 'btn-danger' : 'btn-outline-light' ?> rounded-pill px-4 me-2">Buy Card</a>
    <a href="?view=check" class="btn <?= ($_GET['view'] ?? '') === 'check' ? 'btn-danger' : 'btn-outline-light' ?> rounded-pill px-4">Check Balance</a>
  </div>

  <?php $view = $_GET['view'] ?? 'buy'; ?>

  <?php if ($view === 'check') : ?>
    <div class="card bg-dark-gray shadow p-4">
      <h4 class="mb-3 fw-bold text-danger">Check Gift Card Balance</h4>
      <form method="post">
        <div class="mb-3">
          <label class="form-label">Gift Card Number</label>
          <input type="text" class="form-control" name="card_number" placeholder="16-digit Card Number" required>
        </div>
        <button type="submit" class="btn btn-danger px-4">Check</button>
      </form>
    </div>
  <?php else : ?>
    <div class="card bg-dark-gray shadow p-4">
      <h4 class="mb-3 fw-bold text-danger">Buy a Gift Card</h4>
      <form method="post">

        <!-- Amount Selection -->
        <div class="mb-4">
          <label class="form-label">Choose Amount</label>
          <div class="d-flex flex-wrap gap-2">
            <?php foreach ([10, 25, 50, 75, 100] as $value): ?>
              <button type="button" class="btn btn-outline-light fw-semibold amount-btn" data-value="<?= $value ?>">$<?= $value ?></button>
            <?php endforeach; ?>
          </div>
          <input type="number" name="custom_amount" placeholder="Or enter custom amount" class="form-control mt-2" min="1">
        </div>

        <!-- Sender / Receiver -->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">From Name</label>
            <input name="from_name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Your Email</label>
            <input name="from_email" type="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">To Name</label>
            <input name="to_name" class="form-control" placeholder="Recipient's Name" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Recipient's Email</label>
            <input name="to_email" type="email" class="form-control" placeholder="Recipient's Email" required>
          </div>
          <div class="col-12 mb-3">
            <label class="form-label">Note</label>
            <textarea name="note" class="form-control" placeholder="Add a message (optional)" rows="3"></textarea>
          </div>
        </div>

        <!-- Delivery Time -->
        <div class="mb-3">
          <label class="form-label">When to Send?</label>
          <div class="d-flex gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="delivery_time" id="now" value="now" checked>
              <label class="form-check-label" for="now">Now</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="delivery_time" id="later" value="later">
              <label class="form-check-label" for="later">Later</label>
            </div>
          </div>
        </div>

        <!-- Payment -->
        <h5 class="text-danger mt-4 mb-3 fw-bold">Payment Info</h5>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label">Card Number</label>
            <input name="card_number" class="form-control" placeholder="1234 5678 9012 3456" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Expiry Date</label>
            <input name="expiry" class="form-control" placeholder="MM/YY" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Security Code</label>
            <input name="cvv" class="form-control" placeholder="CVV" required>
          </div>
        </div>

        <!-- Summary -->
        <div class="d-flex justify-content-between align-items-center mt-4 border-top border-light pt-3">
          <div>
            <p class="mb-1">Subtotal: $<span id="subtotal">0.00</span></p>
            <p class="mb-1">Processing Fee: $<span id="fee">2.50</span></p>
            <strong>Total: $<span id="total">2.50</span></strong>
          </div>
          <button type="submit" class="btn btn-danger px-4 fw-bold">Pay Now</button>
        </div>
      </form>
    </div>

    <script>
      let selectedAmount = 0;

      function updateTotal(amount) {
        const fee = 2.5;
        const subtotal = amount.toFixed(2);
        const total = (amount + fee).toFixed(2);
        document.getElementById('subtotal').textContent = subtotal;
        document.getElementById('fee').textContent = fee.toFixed(2);
        document.getElementById('total').textContent = total;
      }

      function selectAmount(value, button) {
        selectedAmount = value;
        document.querySelector('input[name="custom_amount"]').value = '';
        document.querySelectorAll('.amount-btn').forEach(btn => btn.classList.remove('active'));
        if (button) button.classList.add('active');
        updateTotal(value);
      }

      document.querySelectorAll('.amount-btn').forEach(button => {
        button.addEventListener('click', function () {
          const value = parseFloat(this.getAttribute('data-value'));
          selectAmount(value, this);
        });
      });

      document.querySelector('input[name="custom_amount"]').addEventListener('input', function () {
        document.querySelectorAll('.amount-btn').forEach(btn => btn.classList.remove('active'));
        selectedAmount = parseFloat(this.value) || 0;
        updateTotal(selectedAmount);
      });

      // Set default selected amount to $25 on page load
      window.addEventListener('DOMContentLoaded', () => {
        const defaultBtn = document.querySelector('.amount-btn[data-value="25"]');
        if (defaultBtn) selectAmount(25, defaultBtn);
      });
    </script>
  <?php endif; ?>
</div>

<?php include_once(__DIR__ . '/includes/footer.php'); ?>
