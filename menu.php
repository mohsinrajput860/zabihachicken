<?php include_once(__DIR__ . '/includes/header.php'); ?>

<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1056">
  <div id="orderToast" class="toast text-bg-success border-0" role="alert" data-bs-delay="3000">
    <div class="toast-body">Order received!</div>
  </div>
</div>

<!-- Menu Button to Trigger Modal -->
<div class="text-center my-5">
  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#menuModal">
    Order Now
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header border-bottom border-secondary">
        <h5 class="modal-title" id="menuModalLabel">Order From Zabiha Chickens</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Left: Form -->
          <div class="col-lg-5">
            <form id="orderForm">
              <h5 class="text-white">Select Location</h5>

              <div class="mb-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="orderType" id="pickup" value="pickup" checked>
                  <label class="form-check-label text-white" for="pickup">Pickup</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="orderType" id="delivery" value="delivery">
                  <label class="form-check-label text-white" for="delivery">Delivery</label>
                </div>
              </div>

              <div class="mt-3 mb-4">
                <label class="form-label text-white">Find the closest location for your order</label>
                <select class="form-select bg-dark text-white border-secondary" name="location" id="locationSelect" required>
                  <option value="">Select location</option>
                  <option value="manassas">Zabiha Chickens Express – 9745 Liberia Ave, Manassas, VA</option>
                  <option value="dc">Zabiha Chickens - DC – 3728 Georgia Ave NW, Washington, DC</option>
                  <option value="woodbridge">Zabiha Chickens - Woodbridge – 14845 Buildamerica Dr, Woodbridge, VA</option>
                </select>
              </div>

              <div id="deliveryFields" style="display: none;">
                <div class="mb-3">
                  <label class="form-label text-white">Delivery Address</label>
                  <input type="text" name="delivery_address" class="form-control bg-dark text-white border-secondary" placeholder="Enter your address">
                </div>
                <div class="mb-3">
                  <label class="form-label text-white">Apartment / Unit number</label>
                  <input type="text" name="unit_number" class="form-control bg-dark text-white border-secondary" placeholder="Optional">
                </div>
              </div>

              <button type="submit" class="btn btn-outline-light mb-3">View Menu</button>

              <!-- Cart Summary -->
              <div id="cartSummary" class="bg-secondary text-white p-3 rounded d-none">
                <h6>Cart</h6>
                <p>Review your order and proceed to checkout</p>
                <div class="small"><strong>Pickup</strong> · Jul 24 · 12:00 PM EDT <a href="#" class="text-white ms-2">Change</a></div>
                <div class="small mt-2">9745 Liberia Ave</div>
                <div class="small">Zabiha Chickens Express</div>
                <hr class="border-light">
                <div class="d-flex justify-content-between">
                  <span>Subtotal</span>
                  <span>$0.00</span>
                </div>
                <div class="text-end mt-3">
                  <button class="btn btn-danger">Go To Checkout</button>
                </div>
              </div>

            </form>
          </div>

          <!-- Right: iFrame or Website Preview -->
          <div class="col-lg-7">
            <iframe id="menuIframe" src="https://example.com/menu" width="100%" height="500" style="border:1px solid #666;"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const pickupRadio = document.getElementById('pickup');
  const deliveryRadio = document.getElementById('delivery');
  const deliveryFields = document.getElementById('deliveryFields');
  const orderForm = document.getElementById('orderForm');
  const locationSelect = document.getElementById('locationSelect');
  const menuIframe = document.getElementById('menuIframe');
  const cartSummary = document.getElementById('cartSummary');

  pickupRadio.addEventListener('change', toggleDeliveryFields);
  deliveryRadio.addEventListener('change', toggleDeliveryFields);
  locationSelect.addEventListener('change', updateIframe);

  function toggleDeliveryFields() {
    deliveryFields.style.display = deliveryRadio.checked ? 'block' : 'none';
  }

  function updateIframe() {
    const value = locationSelect.value;
    let url = 'https://example.com/menu';
    if (value === 'manassas') {
      url = 'https://example.com/menu-manassas';
    } else if (value === 'dc') {
      url = 'https://example.com/menu-dc';
    } else if (value === 'woodbridge') {
      url = 'https://example.com/menu-woodbridge';
    }
    menuIframe.src = url;
  }

  orderForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(orderForm);

    if (!locationSelect.value) {
      alert("Please select a location.");
      return;
    }

    if (deliveryRadio.checked && !formData.get('delivery_address').trim()) {
      alert("Please enter your delivery address.");
      return;
    }

    // Show cart summary box after form submit
    cartSummary.classList.remove("d-none");

    fetch('process_order.php', {
      method: 'POST',
      body: formData
    })
    .then(res => res.text())
    .then(data => {
      const modal = bootstrap.Modal.getInstance(document.getElementById('menuModal'));
      modal.hide();
      document.querySelector("#orderToast .toast-body").textContent = data;
      new bootstrap.Toast(document.getElementById('orderToast')).show();
    })
    .catch(err => {
      console.error('Error submitting form:', err);
    });
  });
</script>

<?php include_once(__DIR__ . '/includes/footer.php'); ?>
