<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Railway System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../main.css" />
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          🚆 Railway<span class="text-warning">System</span>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#mainNavbar"
          aria-controls="mainNavbar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="trains.php">Trains</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>

            <!-- Book Ticket Button -->
             <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
<a
    class="btn btn-sm btn-accent quick-book-btn"
    data-bs-toggle="modal"
    data-bs-target="#bookingModal"
    data-id="0"
    data-train="Manual Booking"
    data-route="Select Route"
    data-class="General"
    data-price="0"
    data-time="--:--"
>
    Book Now
</a>

</li>
            <!-- Admin Button -->
            <!-- <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
              <a class="btn btn-sm btn-outline-light" href="">
                👑 Admin
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-4">About Railway Management System</h1>
                    <p class="lead mb-4">
                        Leading Pakistan's railway revolution with cutting-edge technology, 
                        premium services, and commitment to excellence in transportation.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <span class="badge bg-warning text-dark px-3 py-2">🚀 Modern Technology</span>
                        <span class="badge bg-warning text-dark px-3 py-2">⭐ Premium Services</span>
                        <span class="badge bg-warning text-dark px-3 py-2">🔒 Safety First</span>
                    </div>
                </div>
            </div>
        </div>
    </section>



  <!-- BUSINESS CLASS SECTION -->
    <section class="content-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side - Card -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="class-card">
                        <div class="class-image" style="background-image: url('../photos/Bussniness/green.webp')">
                            <span class="class-badge">Business Class</span>
                        </div>
                    </div>
                </div>
                <!-- Right Side - Content -->
                <div class="col-lg-6">
                    <div class="ps-lg-5">
                        <h2 class="fw-bold mb-4">Business Class Excellence</h2>
                        <p class="text-muted mb-4">
                            Experience luxury travel with our premium Business Class. Designed for 
                            discerning travelers who value comfort, privacy, and exceptional service.
                        </p>
                        <ul class="facility-list">
                            <li>Luxury recliner seats with extra legroom</li>
                            <li>Individual AC control and premium air conditioning</li>
                            <li>Complimentary gourmet meals and beverages</li>
                            <li>Personal charging ports and reading lights</li>
                            <li>Noise-cancelling headphones and entertainment</li>
                            <li>Priority boarding and dedicated staff service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ECONOMY CLASS SECTION -->
    <section class="content-section alternate-bg">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side - Content -->
                <div class="col-lg-6">
                    <div class="pe-lg-5">
                        <h2 class="fw-bold mb-4">Economy Class Comfort</h2>
                        <p class="text-muted mb-4">
                            Affordable travel without compromising on comfort. Our Economy Class 
                            offers excellent value with all essential amenities for a pleasant journey.
                        </p>
                        <ul class="facility-list">
                            <li>Comfortable cushioned seats with adequate space</li>
                            <li>Centralized air conditioning system</li>
                            <li>Food and beverage service available for purchase</li>
                            <li>Shared charging stations in each coach</li>
                            <li>Large windows for scenic views</li>
                            <li>Ample luggage storage space</li>
                        </ul>
                    </div>
                </div>
                <!-- Right Side - Card -->
                <div class="col-lg-6">
                    <div class="class-card">
                        <div class="class-image" style="background-image: url('../photos/Economy/iqbal.jpeg')">
                            <span class="class-badge">Economy Class</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AC SLEEPER SECTION -->
    <section class="content-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side - Card -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="class-card">
                        <div class="class-image" style="background-image: url('../photos/AC Standard/sleeper.jpg')">
                            <span class="class-badge">AC Sleeper</span>
                        </div>
                    </div>
                </div>
                <!-- Right Side - Content -->
                <div class="col-lg-6">
                    <div class="ps-lg-5">
                        <h2 class="fw-bold mb-4">AC Sleeper Luxury</h2>
                        <p class="text-muted mb-4">
                            Perfect for overnight journeys, our AC Sleeper class provides private 
                            sleeping accommodations with premium amenities for a restful travel experience.
                        </p>
                        <ul class="facility-list">
                            <li>Private sleeping berths with fresh bedding</li>
                            <li>Individual AC vents for personalized comfort</li>
                            <li>Complimentary dinner and breakfast service</li>
                            <li>Secure luggage compartments and privacy curtains</li>
                            <li>Access to premium washroom facilities</li>
                            <li>Night journey comfort with reduced noise</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AC STANDARD SECTION -->
    <section class="content-section alternate-bg">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side - Content -->
                <div class="col-lg-6">
                    <div class="pe-lg-5">
                        <h2 class="fw-bold mb-4">AC Standard Comfort</h2>
                        <p class="text-muted mb-4">
                            Enjoy climate-controlled comfort with our AC Standard class, offering 
                            premium features at an affordable price point for everyday travelers.
                        </p>
                        <ul class="facility-list">
                            <li>Premium reclining seats with extra padding</li>
                            <li>Advanced climate control air conditioning</li>
                            <li>Complimentary snack and beverage service</li>
                            <li>Individual USB and power outlets</li>
                            <li>Free WiFi access during journey</li>
                            <li>Priority service and express check-in</li>
                        </ul>
                    </div>
                </div>
                <!-- Right Side - Card -->
                <div class="col-lg-6">
                    <div class="class-card">
                        <div class="class-image" style="background-image: url('../photos/AC Standard/standard.jpeg')">
                            <span class="class-badge">AC Standard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <!-- SERVICES CARDS SECTION -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Our Services & Facilities</h2>
                <p class="text-muted">Comprehensive railway solutions for modern Pakistan</p>
            </div>

            <div class="row g-4">
                
                <!-- Card 1: Online Booking -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/images.jpeg')">
                            <span class="service-badge">Digital Service</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Online Ticket Booking</h3>
                            <p class="service-description">
                                Book your train tickets anytime, anywhere with our user-friendly 
                                online platform. Secure payments, instant confirmations, and 
                                easy modifications.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Multiple Classes -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/IMG_6765.jpg')">
                            <span class="service-badge">Travel Options</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Multiple Travel Classes</h3>
                            <p class="service-description">
                                Choose from Business, Economy, AC Sleeper, and AC Standard classes. 
                                Each designed for specific comfort needs and budget preferences.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Safety Measures -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/images\ \(1\).jpeg')">
                            <span class="service-badge">Security</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Safety & Security</h3>
                            <p class="service-description">
                                100% safety record with trained staff, emergency protocols, 
                                and modern security systems. Your safety is our top priority.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Nationwide Network -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/images\ \(2\).jpeg')">
                            <span class="service-badge">Network</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Nationwide Coverage</h3>
                            <p class="service-description">
                                Connecting 15+ major cities across Pakistan. From Karachi to Peshawar, 
                                Quetta to Lahore - we've got all routes covered.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Customer Support -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/AdobeStock_497985587.jpeg')">
                            <span class="service-badge">Support</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">24/7 Customer Support</h3>
                            <p class="service-description">
                                Round-the-clock customer service via phone, email, and chat. 
                                Quick resolution of queries and dedicated support team.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Modern Fleet -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/images\ \(3\).jpeg')">
                            <span class="service-badge">Fleet</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Modern Train Fleet</h3>
                            <p class="service-description">
                                24+ well-maintained trains with modern amenities. Regular 
                                maintenance and upgrades for optimal performance.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 7: Food Services -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/images\ \(4\).jpeg')">
                            <span class="service-badge">Catering</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">On-Board Catering</h3>
                            <p class="service-description">
                                Quality food and beverage services. From snacks to full meals, 
                                we ensure delicious dining experiences during your journey.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 8: Technology -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/images\ \(5\).jpeg')">
                            <span class="service-badge">Tech</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Advanced Technology</h3>
                            <p class="service-description">
                                Real-time tracking, digital ticketing, automated systems, 
                                and mobile app integration for seamless travel experience.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 9: Affordable Pricing -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-image" style="background-image: url('../photos/servcices/images\ \(6\).jpeg')">
                            <span class="service-badge">Value</span>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title">Affordable Pricing</h3>
                            <p class="service-description">
                                Competitive pricing across all classes. Special discounts for 
                                students, seniors, and group bookings. Value for money guaranteed.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-number">24+</div>
                    <div class="fw-semibold">Active Trains</div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-number">15+</div>
                    <div class="fw-semibold">Cities Connected</div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-number">50k+</div>
                    <div class="fw-semibold">Happy Customers</div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-number">100%</div>
                    <div class="fw-semibold">Safety Record</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <!-- <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="fw-bold h5">🚆 Railway Management System</span>
                    <p class="text-muted small mb-0 mt-1">Comprehensive Railway Solutions for Pakistan</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <span class="text-warning">Service</span> • 
                        <span class="text-warning">Safety</span> • 
                        <span class="text-warning">Satisfaction</span>
                    </p>
                </div>
            </div>
        </div>
    </footer> -->
    <footer class="uni-footer bg-dark mt-4">
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
          <li><a href="../index.php">Home</a></li>
          <li><a href="trains.php">Train Schedules</a></li>
          <li><a href="#bookingModal" data-bs-toggle="modal">Ticket Booking</a></li>
          <li><a href="#">Tracking System</a></li>
          <li><a href="contact.php">Help Center</a></li>
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



  <!-- BOOKING MODAL -->
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

            <!-- Route & Train Name -->
            <div class="mb-3">
              <label for="formRoute" class="form-label">Route</label>
              <input type="text" id="formRoute" class="form-control" name="route" readonly>
            </div>
            <div class="mb-3">
              <label for="formTrain" class="form-label">Train</label>
              <input type="text" id="formTrain" class="form-control" name="train_name" readonly>
            </div>

            <div class="row g-3">
              <div class="col-md-4">
                <label for="formClass" class="form-label">Class</label>
                <input type="text" id="formClass" class="form-control" name="class" readonly>
              </div>
              <div class="col-md-4">
                <label for="formPrice" class="form-label">Price (Rs.)</label>
                <input type="text" id="formPrice" class="form-control" name="price" readonly>
              </div>
              <div class="col-md-4">
                <label for="formTime" class="form-label">Train Time</label>
                <input type="text" id="formTime" class="form-control" name="train_time" readonly>
              </div>
            </div>

            <!-- Travel Date & Seats -->
            <div class="row g-3 mt-3">
              <div class="col-md-6">
                <label for="travelDate" class="form-label">Travel Date</label>
                <input type="date" id="travelDate" name="travel_date" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="seats" class="form-label">Seats</label>
                <input type="number" id="seats" name="seats" class="form-control" value="1" min="1">
              </div>
            </div>

            <hr>

            <!-- Passenger Details -->
            <div class="mb-3">
              <label for="passengerName" class="form-label">Passenger Name</label>
              <input type="text" id="passengerName" name="passenger_name" class="form-control">
            </div>
            <div class="row g-3">
              <div class="col-md-4">
                <label for="cnic" class="form-label">CNIC</label>
                <input type="text" id="cnic" name="cnic" class="form-control">
              </div>
              <div class="col-md-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control">
              </div>
              <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control">
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
  <script>
document.addEventListener("DOMContentLoaded", function () {

    function fillBookingForm(btn) {
        document.getElementById("formTrainId").value = btn.dataset.id || "";
        document.getElementById("formRoute").value = btn.dataset.route || "";
        document.getElementById("formTrain").value = btn.dataset.train || "";
        document.getElementById("formClass").value = btn.dataset.class || "";
        document.getElementById("formPrice").value = btn.dataset.price || "";
        document.getElementById("formTime").value = btn.dataset.time || "";
    }

    // For Book Now inside trains
    document.querySelectorAll(".book-btn").forEach(button => {
        button.addEventListener("click", function () {
            fillBookingForm(this);
        });
    });

    // For all Quick Booking style buttons (header, about, manual)
    document.querySelectorAll(".quick-book-btn").forEach(button => {
        button.addEventListener("click", function () {
            fillBookingForm(this);
        });
    });

});
</script>

</body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const paymentMethod = document.getElementById('payment_method');
    const stripeFields = document.getElementById('stripeFields');
    const jazzcashFields = document.getElementById('jazzcashFields');

    paymentMethod.addEventListener('change', function() {
      if(this.value === 'stripe') {
        stripeFields.style.display = 'block';
        jazzcashFields.style.display = 'none';
      } else if(this.value === 'jazzcash') {
        stripeFields.style.display = 'none';
        jazzcashFields.style.display = 'block';
      } else {
        stripeFields.style.display = 'none';
        jazzcashFields.style.display = 'none';
      }
    });
  </script>
</html>