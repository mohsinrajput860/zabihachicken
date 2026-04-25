<?php
include_once(__DIR__ . '/includes/header.php');

// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // your DB password
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to add a new catering request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $date = $conn->real_escape_string($_POST['date']);
  $time = $conn->real_escape_string($_POST['time']);
  $people = $conn->real_escape_string($_POST['people']);
  $method = $conn->real_escape_string($_POST['method']);
  $details = $conn->real_escape_string($_POST['details']);

  $sql = "INSERT INTO catering_requests (name, email, phone, date, time, people, method, details) 
          VALUES ('$name', '$email', '$phone', '$date', '$time', '$people', '$method', '$details')";
  if ($conn->query($sql) === TRUE) {
    echo '<div class="alert alert-success">Catering request added successfully!</div>';
  } else {
    echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
  }
}

// Fetch all catering requests
$sql = "SELECT * FROM catering_requests ORDER BY id DESC";
$result = $conn->query($sql);
?>

<style>
  body, html {
    background-color: #000000;
    color: #ffffff;
  }
  .container {
    background-color: #111111;
    border-radius: 12px;
    padding: 2rem;
    margin-top: 2rem;
    max-width: 1000px;
  }
  h1, h2 {
    color: #FF4500;
  }
  table {
    color: #fff;
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    padding: 12px;
    border-bottom: 1px solid #333;
    text-align: left;
  }
  input, select, textarea {
    background-color: #222;
    color: #fff;
    border: 1px solid #555;
    padding: 8px;
    border-radius: 6px;
    width: 100%;
  }
  input::placeholder, textarea::placeholder {
    color: #888;
  }
  button {
    background-color: #FF4500;
    color: #fff;
    border: none;
    padding: 12px 25px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 700;
  }
  button:hover {
    background-color: #cc3700;
  }
  label {
    font-weight: 600;
    display: block;
    margin-bottom: 6px;
  }
  .form-row {
    display: flex;
    gap: 1rem;
  }
  .form-col {
    flex: 1;
  }
  .form-col-half {
    flex: 0 0 48%;
  }
</style>

<div class="container">
  <h1>Manage Catering Requests</h1>

  <!-- Add Catering Request Form -->
  <h2>Add New Request</h2>
  <form method="post" action="">
    <div class="form-row">
      <div class="form-col-half">
        <label for="name">Full Name *</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="form-col-half">
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-col-half">
        <label for="phone">Phone *</label>
        <input type="tel" id="phone" name="phone" placeholder="(555) 555-5555" required>
      </div>
      <div class="form-col-half">
        <label for="date">Date *</label>
        <input type="date" id="date" name="date" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-col-half">
        <label for="time">Time *</label>
        <input type="time" id="time" name="time" required>
      </div>
      <div class="form-col-half">
        <label for="people">Number of People *</label>
        <select id="people" name="people" required>
          <option value="">Select...</option>
          <option value="1-9">1-9</option>
          <option value="10-19">10-19</option>
          <option value="20-29">20-29</option>
          <option value="30-39">30-39</option>
          <option value="40-49">40-49</option>
          <option value="50+">50+</option>
        </select>
      </div>
    </div>

    <div class="form-row" style="margin-bottom: 1rem;">
      <div class="form-col">
        <label>Delivery or Pickup *</label>
        <input type="radio" id="delivery" name="method" value="Delivery" required>
        <label for="delivery" style="display:inline; margin-right: 1.5rem;">Delivery</label>
        <input type="radio" id="pickup" name="method" value="Pickup" required>
        <label for="pickup" style="display:inline;">Pickup</label>
      </div>
    </div>

    <div class="form-row">
      <div class="form-col">
        <label for="details">Additional Details</label>
        <textarea id="details" name="details" rows="4" placeholder="Special instructions, menu preferences, etc."></textarea>
      </div>
    </div>

    <div style="text-align:center; margin-top: 1rem;">
      <button type="submit">Send Catering Request</button>
    </div>
  </form>

  <hr style="border-color: #444; margin: 2rem 0;">

  <!-- Catering Requests List -->
  <h2>Existing Catering Requests</h2>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Date</th>
          <th>Time</th>
          <th>People</th>
          <th>Method</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo htmlspecialchars($row['id']); ?></td>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['phone']); ?></td>
          <td><?php echo htmlspecialchars($row['date']); ?></td>
          <td><?php echo htmlspecialchars($row['time']); ?></td>
          <td><?php echo htmlspecialchars($row['people']); ?></td>
          <td><?php echo htmlspecialchars($row['method']); ?></td>
          <td><?php echo htmlspecialchars($row['details']); ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No catering requests found.</p>
  <?php endif; ?>
</div>

<?php
$conn->close();
include_once(__DIR__ . '/includes/footer.php');
?>
