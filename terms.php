<?php
include_once 'config/config.php';
include 'includes/header.php';

// Dynamic Meta Title and Description
ob_start();
?>
<title>Terms & Privacy Policy | Zabihachicken</title>
<meta name="description" content="Review Zabihachicken's updated terms, privacy, and delivery policies." />
<?php
$headContent = ob_get_clean();
?>

<div class="container py-5">
  <h1 class="mb-4 text-center fw-bold">Terms, Privacy & Policy Statements</h1>

  <section class="mb-5">
    <h2 class="fw-bold">Zabiha Chicken Privacy Commitment</h2>
    <p><strong>Last Revised:</strong> April 15, 2025</p>
    <p>Zoya Ali LLC, along with its subsidiaries ("we", "our", "us"), is dedicated to safeguarding your privacy through this updated policy.</p>
    <p>This document outlines how your personal data is collected, used, shared, and protected when you access our website (zabihachicken.com) and services.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">1. Information We Collect & Its Purpose</h2>
    <table class="table table-bordered table-dark">
      <thead class="table-light text-dark">
        <tr>
          <th>Type of Personal Data</th>
          <th>Purpose for Collection/Use</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Identifiers (e.g., name, email, IP address)</td>
          <td>Managing accounts, communication, promotions, system security</td>
        </tr>
        <tr>
          <td>Purchase-related details</td>
          <td>Understanding shopping habits, auditing, enhancing user experience</td>
        </tr>
        <tr>
          <td>Demographic data</td>
          <td>Targeted offerings and birthday promotions</td>
        </tr>
        <tr>
          <td>Web usage statistics</td>
          <td>Analyzing behavior, ad targeting, user tracking</td>
        </tr>
        <tr>
          <td>Location data</td>
          <td>Providing local deals, fraud monitoring, advertising</td>
        </tr>
        <tr>
          <td>Employment-related details</td>
          <td>Used in collaborations and vendor partnerships</td>
        </tr>
        <tr>
          <td>User behavior insights</td>
          <td>Personalizing experiences and marketing direction</td>
        </tr>
      </tbody>
    </table>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">2. Information Sources & 3. Cookies</h2>
    <p>We gather information from users, partners, cookies, social platforms, and analytics tools. Cookies help improve website features and ad targeting.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">4. Data Retention & 5. Sharing</h2>
    <p>We retain information as required for compliance, operations, and services. Certain data may be shared with service providers or disclosed for legal obligations.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">6. Rights in California and Other States</h2>
    <p>Residents of California and other states can view, modify, or delete their data and decline personalized ads. Requests require identity verification.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">8. Email Settings</h2>
    <p>To stop receiving promotional messages, users can unsubscribe through the link in emails or reach out to us directly.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">9. Third-Party Tools</h2>
    <p>Some features use external platforms like social media. These are governed by their respective privacy policies, not ours.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">10. Safeguarding Your Data</h2>
    <p>We implement standard security measures. Users are also responsible for protecting their login credentials.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">11. Children’s Data Protection</h2>
    <p>We don’t collect information knowingly from minors under 16. If found, such information is promptly deleted.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">12. Get in Touch</h2>
    <p><strong>Zabihachicken</strong></p>
    <p><strong>Phone:</strong> (703) 656-9964</p>
    <p><strong>Email:</strong> Zabihachicken@gmail.com</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">Order Policy</h2>
    <h5>A. Cancelling Orders</h5>
    <p>Orders can only be canceled before choosing either the 'Pay for Pickup' or 'Pay for Delivery' option.</p>

    <h5>B. Refunds & Replacement</h5>
    <p>If there's an issue such as missing or incorrect items, please reach out. Refunds will be processed to the original payment source.</p>
  </section>

  <section class="mb-5">
    <h2 class="fw-bold">Delivery Guidelines</h2>
    <h5>A. Availability</h5>
    <p>Deliveries depend on stock availability. We will inform you about unavailable items.</p>

    <h5>B. Delivery Coverage</h5>
    <p>We only deliver within defined areas near our restaurant.</p>

    <h5>C. Estimated Timing</h5>
    <p>Delivery estimates are provided but not promised as exact times.</p>

    <h5>D. Scheduled Date</h5>
    <p>The customer selects the delivery date during checkout.</p>

    <h5>E. Delivery Charges</h5>
    <p>Additional charges may be applied based on the delivery zone.</p>

    <h5>F. Delivery Notes</h5>
    <p>Special instructions can be mentioned while placing the order.</p>

    <h5>G. Help & Inquiries</h5>
    <p>If you have any delivery-related questions, feel free to contact us.</p>
  </section>
</div>

<?php include 'includes/footer.php'; ?>
