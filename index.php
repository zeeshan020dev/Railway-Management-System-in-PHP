<?php
session_start();
require 'connect.php';

/* =========================
   Prevent caching (Logout Fix)
========================= */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

/* =========================
   Auto Redirect if Logged Out
========================= */
if (!isset($_SESSION['user_id'])) {
    $isLoggedIn = false;
    $isAdmin = false;
} else {
    $isLoggedIn = true;
    $isAdmin = ($_SESSION['role'] === 'admin');
}

/* =========================
   Fetch all trains
========================= */
$all_trains = $pdo->query("
    SELECT t.*, r.name AS route_name 
    FROM trains t 
    JOIN routes r ON t.route_id = r.id
    ORDER BY t.created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);

/* =========================
   Group trains by class
========================= */
$trains_by_class = [
    'Business' => [],
    'Economy' => [],
    'AC Standard' => [],
    'AC Sleeper' => []
];

foreach($all_trains as $t){
    if(isset($trains_by_class[$t['class']])){
        $trains_by_class[$t['class']][] = $t;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Railway Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./main.css" />
    
    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <style>
    .train-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        padding-bottom: 10px;
    }

    .card-footer-line {
        margin-top: auto; 
        padding-top: 10px;
    }

    /* Red border for invalid fields */
    .is-invalid {
        border-color: #dc3545 !important;
    }
    </style>
</head>
<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background:#1f2937;" data-aos="fade-down">
  <div class="container">
    <a class="navbar-brand" href="../index.php">🚆 Railway<span class="text-warning">System</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

            <li class="nav-item"><a class="nav-link active"  href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="./pages/trains.php">Trains</a></li>
            <li class="nav-item"><a class="nav-link" href="./pages/about.php">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="./pages/contact.php">Contact</a></li>

            <?php if(isset($_SESSION['user_id'])): ?>

                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn btn-sm btn-outline-light" href="./admin-panel/user_dashboard.php">My Bookings</a>
                </li>

                <?php if($_SESSION['role'] === 'admin'): ?>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn btn-sm btn-outline-warning" href="./admin-panel/index.php">👑 Admin Panel</a>
                </li>
                <?php endif; ?>

                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn btn-sm btn-danger" href="./admin-panel/logout.php">Logout</a>
                </li>

            <?php else: ?>

                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn btn-sm btn-accent" href="./admin-panel/register.php">Register</a>
                </li>

                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn btn-sm btn-outline-light" href="./admin-panel/login.php">Login</a>
                </li>

            <?php endif; ?>

        </ul>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
    <video autoplay muted loop playsinline data-aos="fade-up">
        <source src="https://www.youtube.com/shorts/1rvPKzv_-QY?t=2&feature=share" type="video/mp4"/>
        Your browser does not support the video tag.
    </video>
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <div class="row align-items-center g-4">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-badge"><span>●</span> Online Railway Reservation</div>
                <h1 class="hero-title">Travel Smart with<br /><span class="text-warning">Railway Management System</span></h1>
                <p class="hero-subtitle">Karachi se Lahore, Quetta se Peshawar – aik hi platform se country bhar ke routes, real classes ke saath. Book your seat in a few clicks.</p>
                <div class="d-flex flex-wrap gap-3 mt-3">
                    <a href="#classes" class="btn btn-accent btn-lg" data-aos="zoom-in">View Classes & Routes</a>
                    <?php if(isset($_SESSION['user_id'])): ?>
                    <!-- <button class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#bookingModal" data-aos="zoom-in" data-aos-delay="100">Quick Booking</button> -->
                    <button class="btn btn-outline-light btn-lg quick-book-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#bookingModal"
                            data-id="0"
                            data-train="Manual Booking"
                            data-route="Select Route"
                            data-class="General"
                            data-price="0"
                            data-time="--:--">
                            Quick Booking
                    </button>

                    <?php else: ?>
                    <a class="btn btn-outline-light btn-lg" href="./admin-panel/login.php" data-aos="zoom-in" data-aos-delay="100">Quick Booking</a>
                    <?php endif; ?>
                </div>
            </div>

<div class="col-lg-5 ms-lg-auto" data-aos="fade-left">
    <div class="hero-search-card rounded-4 p-3 p-lg-4 text-light" style="background: #1f2937;">
      <p class="hero-label mb-1">Quick Search</p>
      <h5 class="mb-3">Find Your Train</h5>
      <form id="trainSearchForm" method="GET" action="./pages/trains.php">
          <div class="mb-3">
              <label class="hero-label" for="fromStation">From Station</label>
              <input list="stations" id="fromStation" name="fromStation" class="form-control form-control-sm" placeholder="Select From Station" required>
          </div>
          <div class="mb-3">
              <label class="hero-label" for="toStation">To Station</label>
              <input list="stations" id="toStation" name="toStation" class="form-control form-control-sm" placeholder="Select To Station" required>
              <datalist id="stations">
                  <option value="Karachi"></option>
                  <option value="Lahore"></option>
                  <option value="Islamabad"></option>
                  <option value="Multan"></option>
                  <option value="Hyderabad"></option>
                  <option value="Faisalabad"></option>
                  <option value="Rawalpindi"></option>
                  <option value="Quetta"></option>
                  <option value="Peshawar"></option>
              </datalist>
          </div>
          <div class="mb-3">
              <label for="travelDate">Travel Date</label>
              <input type="date" id="travelDate" name="travelDate" class="form-control form-control-sm" required min="<?= date('Y-m-d'); ?>">
          </div>
          <button type="submit" class="btn btn-accent w-100" id="searchBtn">Search Trains</button>
          <p class="mt-2 mb-0" style="font-size: 0.78rem; color: #d1d5db">*Demo frontend – actual search handled by backend.</p>
      </form>
    </div>
</div>

        </div>
    </div>
</section>

<!-- TRAIN CLASSES SECTION -->
<section id="classes" class="class-section">
<div class="container">
    <?php foreach($trains_by_class as $className => $classTrains): ?>
    <div class="mb-5 mt-4 <?= strtolower(str_replace(' ', '-', $className)) ?>-section" data-aos="fade-up">

        <div class="d-flex align-items-center justify-content-between mb-2">
            <span class="class-badge <?= strtolower(str_replace(' ', '-', $className)) ?>" data-aos="fade-right"><?= $className ?> Class</span>
            <span class="text-muted small" data-aos="fade-left">Details for <?= $className ?></span>
        </div>

        <div class="row g-3">
        <?php foreach($classTrains as $t): ?>
            <div class="col-md-4" data-aos="fade-up">
                <div class="train-card">

                    <!-- IMAGE -->
                    <div class="train-img-wrap">
                        <img src="./admin-panel/uploads/<?= htmlspecialchars($t['image']) ?>"
                             alt="Train Image"
                             class="img-fluid"
                             style="width:100%; height:180px; object-fit:cover; border-radius:8px;">
                        <span class="route-chip"><?= htmlspecialchars($t['route_name']) ?></span>
                    </div>

                    <!-- BODY -->
                    <div class="train-body mt-2">
                        <div class="train-name"><?= htmlspecialchars($t['train_name']) ?></div>
                        <div class="train-meta"><span><?= htmlspecialchars($t['depart_time']) ?></span></div>

                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="price-tag">From Rs. <?= number_format($t['price'],0) ?></span>
                            <span class="badge bg-primary-subtle text-primary">
                                <?= htmlspecialchars($t['class']) ?>
                            </span>
                        </div>
                    </div>

                    <!-- FOOTER (FIXED ALIGNMENT) -->
                    <div class="card-footer-line">
                        <span class="seat-pill">Seats: <?= $t['seats'] ?></span>

                        <?php if(isset($_SESSION['user_id'])): ?>
                        <button class="btn btn-sm btn-accent book-btn"
                          data-id="<?= $t['id'] ?>"
                          data-class="<?= htmlspecialchars($t['class']) ?>"
                          data-route="<?= htmlspecialchars($t['route_name']) ?>"
                          data-train="<?= htmlspecialchars($t['train_name']) ?>"
                          data-price="<?= number_format($t['price'],0) ?>"
                          data-time="<?= htmlspecialchars($t['depart_time']) ?>">
                          Book Now
                        </button>

                        <?php else: ?>
                        <a href="./admin-panel/login.php" class="btn btn-sm btn-accent">Book Now</a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        </div>

    </div>
    <?php endforeach; ?>
</div>
</section>

<!-- Booking Modal (same as original) -->
<!-- ... your existing booking modal code stays the same ... -->

<div class="modal fade" id="bookingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Ticket Booking</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body p-4">
        <form action="submit_booking.php" method="post" id="bookingForm">
          <input type="hidden" name="train_id" id="formTrainId">

          <!-- Route -->
          <div class="mb-3">
            <label for="formRoute" class="form-label">Route</label>
            <input type="text" id="formRoute" class="form-control" name="route" readonly>
            <div class="text-danger small field-error" id="errorRoute"></div>
          </div>

          <!-- Train Name -->
          <div class="mb-3">
            <label for="formTrain" class="form-label">Train</label>
            <input type="text" id="formTrain" class="form-control" name="train_name" readonly>
            <div class="text-danger small field-error" id="errorTrain"></div>
          </div>

          <div class="row g-3">
            <div class="col-md-4">
              <label for="formClass" class="form-label">Class</label>
              <input type="text" id="formClass" class="form-control" name="class" readonly>
              <div class="text-danger small field-error" id="errorClass"></div>
            </div>
            <div class="col-md-4">
              <label for="formPrice" class="form-label">Price (Rs.)</label>
              <input type="text" id="formPrice" class="form-control" name="price" readonly>
            </div>
            <div class="col-md-4">
              <label for="formTime" class="form-label">Train Time</label>
              <input type="text" id="formTime" class="form-control" name="train_time" readonly>
              <div class="text-danger small field-error" id="errorTime"></div>
            </div>
          </div>

          <!-- Travel Date & Seats -->
          <div class="row g-3 mt-3">
            <div class="col-md-6">
              <label for="travelDate" class="form-label">Travel Date</label>
              <input type="date" id="travelDate" name="travel_date" class="form-control">
              <div class="text-danger small field-error" id="errorDate"></div>
            </div>
            <div class="col-md-6">
              <label for="seats" class="form-label">Seats</label>
              <input type="number" id="seats" name="seats" class="form-control" value="1" min="1">
              <div class="text-danger small field-error" id="errorSeats"></div>
            </div>
          </div>

          <hr>

          <!-- Passenger Details -->
          <div class="mb-3">
            <label for="passengerName" class="form-label">Passenger Name</label>
            <input type="text" id="passengerName" name="passenger_name" class="form-control">
            <div class="text-danger small field-error" id="errorPassenger"></div>
          </div>

          <div class="row g-3">
            <div class="col-md-4">
              <label for="cnic" class="form-label">CNIC</label>
              <input type="text" id="cnic" name="cnic" class="form-control">
              <div class="text-danger small field-error" id="errorCnic"></div>
            </div>
            <div class="col-md-4">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" id="phone" name="phone" class="form-control">
            </div>
            <div class="col-md-4">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" class="form-control">
              <div class="text-danger small field-error" id="errorEmail"></div>
            </div>
          </div>

          <!-- Payment Method -->
          <div class="mb-3 mt-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select id="payment_method" name="payment_method" class="form-select" required>
              <option value="">Select</option>
              <option value="stripe">Stripe</option>
              <option value="jazzcash">JazzCash</option>
            </select>
            <div class="text-danger small field-error" id="errorPayment"></div>
          </div>

          <!-- Stripe Fields -->
          <div id="stripeFields" style="display:none;">
            <div class="mb-3">
              <label class="form-label">Card Number</label>
              <input type="text" name="stripe_card_number" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Expiry Date</label>
              <input type="month" name="stripe_expiry" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">CVV</label>
              <input type="text" name="stripe_cvv" class="form-control">
            </div>
          </div>

          <!-- JazzCash Fields -->
          <div id="jazzcashFields" style="display:none;">
            <div class="mb-3">
              <label class="form-label">Mobile Number</label>
              <input type="text" name="jazz_mobile" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Transaction ID</label>
              <input type="text" name="jazz_txn_id" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label for="special_requests" class="form-label">Special Requests</label>
            <textarea id="special_requests" name="special_requests" class="form-control" rows="2"></textarea>
          </div>

          <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Footer (same as original) -->
<!-- ... your existing footer code stays the same ... -->

<footer class="uni-footer bg-dark">
  <div class="container">
    <div class="row gy-4">

      <!-- Brand -->
      <div class="col-md-4">
        <span class="uni-footer-brand d-block mb-3">🚆 Railway Management System</span>
        <p class="small">
          Smart digital railway reservation and management platform connecting cities across Pakistan.
        </p>
        <p class="small">
          <strong>Support:</strong> <span class="text-warning">info@railway.com</span>
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4">
        <h6 class="uni-footer-title">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="index.php">Home</a></li>
          <li><a href="./pages/trains.php">Train Schedules</a></li>
          <li><a href="#bookingModal" data-bs-toggle="modal">Ticket Booking</a></li>
          <li><a href="#">Tracking System</a></li>
          <li><a href="./pages/contact.php">Help Center</a></li>
        </ul>
      </div>

      <!-- System Stats -->
      <div class="col-md-4 text-md-end">
        <h6 class="uni-footer-title">System Stats</h6>
        <div class="uni-footer-stats mb-3">
          <span>24+</span> Active Trains<br>
          <span>15+</span> Connected Cities<br>
          <span>4</span> Travel Classes
        </div>

        <!-- Social -->
        <div class="d-flex gap-3 justify-content-md-end">
          <a class="uni-social-link" href="#">🌐</a>
          <a class="uni-social-link" href="#">📘</a>
          <a class="uni-social-link" href="#">📷</a>
          <a class="uni-social-link" href="#">🐦</a>
        </div>
      </div>

    </div>

    <!-- Bottom -->
    <div class="uni-footer-bottom row mt-4 align-items-center">
      <div class="col-md-6">
        © <?php echo date("Y"); ?> Railway Management System. All rights reserved.
      </div>
      <div class="col-md-6 text-md-end">
        Designed for Academic Project
      </div>
    </div>
  </div>
</footer>

<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    easing: 'ease-out',
    once: true
  });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
  document.getElementById("bookingForm").addEventListener("submit", function(e) {
      let hasError = false;
  
      // Clear previous errors
      document.querySelectorAll(".field-error").forEach(el => el.innerText = "");
  
      // List of required fields with their IDs and error messages
      const requiredFields = [
          {id: "formRoute", errorId: "errorRoute", message: "Route is required"},
          {id: "travelDate", errorId: "errorDate", message: "Travel date is required"},
          {id: "passengerName", errorId: "errorPassenger", message: "Passenger name is required"},
          {id: "cnic", errorId: "errorCnic", message: "CNIC is required"},
          {id: "email", errorId: "errorEmail", message: "Email is required"},
          {id: "payment_method", errorId: "errorPayment", message: "Payment method is required"}
      ];
  
      // Loop through all required fields and check for empty values
      requiredFields.forEach(f => {
          const field = document.getElementById(f.id);
          const val = field.value.trim();
  
          if (!val) {
              document.getElementById(f.errorId).innerText = f.message;
              field.classList.add("is-invalid"); // Add red border to highlight error
              hasError = true;
          } else {
              field.classList.remove("is-invalid");
          }
      });
  
      if (hasError) {
          e.preventDefault(); // Prevent form submission if any field is empty
      }
  });
  </script>
  <script>
  document.getElementById('payment_method').addEventListener('change', function() {
      var stripe = document.getElementById('stripeFields');
      var jazz = document.getElementById('jazzcashFields');
  
      stripe.style.display = 'none';
      jazz.style.display = 'none';
  
      if(this.value === 'stripe') stripe.style.display = 'block';
      if(this.value === 'jazzcash') jazz.style.display = 'block';
  });
  </script>
  
  <style>
  /* Red border for invalid fields */
  .is-invalid {
      border-color: #dc3545 !important;
  }
  </style>
  
  <script>
  document.addEventListener('click', function(e){
    if(e.target.closest('.book-btn')){
      const btn = e.target.closest('.book-btn');
      document.getElementById('formTrainId').value = btn.dataset.id;
      document.getElementById('formRoute').value = btn.dataset.route;
      document.getElementById('formTrain').value = btn.dataset.train;
      document.getElementById('formClass').value = btn.dataset.class;
      document.getElementById('formPrice').value = btn.dataset.price;
      document.getElementById('formTime').value = btn.dataset.time;
  
      const dateInput = document.getElementById('travelDate');
      const today = new Date().toISOString().split('T')[0];
      dateInput.min = today;
      if(!dateInput.value) dateInput.value = today;
  
      const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
      modal.show();
    }
  });
  </script>
  <script>
  const btn = document.getElementById("backToTop");
  
  window.addEventListener("scroll", () => {
      if (window.scrollY > 200) {
          btn.style.display = "flex";
      } else {
          btn.style.display = "none";
      }
  });
  
  btn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
  });
  </script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    function fillBookingForm(btn) {
        document.getElementById("formTrainId").value = btn.dataset.id;
        document.getElementById("formRoute").value = btn.dataset.route;
        document.getElementById("formTrain").value = btn.dataset.train;
        document.getElementById("formClass").value = btn.dataset.class;
        document.getElementById("formPrice").value = btn.dataset.price;
        document.getElementById("formTime").value = btn.dataset.time;
    }

    // For Book Now buttons inside trains
    document.querySelectorAll(".book-btn").forEach(button => {
        button.addEventListener("click", function () {
            fillBookingForm(this);
        });
    });

    // For Quick Booking button
    const quickBtn = document.querySelector(".quick-book-btn");
    if (quickBtn) {
        quickBtn.addEventListener("click", function () {
            fillBookingForm(this);
        });
    }

});
</script>



<!-- Your existing JS scripts for booking modal, validation, payment toggle, back to top -->
<!-- Keep everything else as it is -->
</body>
</html>
