<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Railway System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="../main.css" />

    <style>
        .hero-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            padding: 100px 0 60px;
        }
        
        .contact-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: none;
            overflow: hidden;
            height: 100%;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #f59e0b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        
        .station-card {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
        }
        
        .station-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        .form-control:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 0.2rem rgba(245, 158, 11, 0.25);
        }
        
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background:#1f2937;">
  <div class="container">
    <a class="navbar-brand" href="#">
      🚆 Railway<span class="text-warning">System</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="trains.php">Trains</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="contact.php">Contact</a>
        </li>

    
        <?php if(isset($_SESSION['user_id'])): ?>

          <?php if($_SESSION['role'] === 'admin'): ?>
            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
              <a class="btn btn-sm btn-warning text-dark fw-bold" href="../admin-panel/index.php">
                👑 Admin Panel
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
              <a class="btn btn-sm btn-outline-light" href="../admin-panel/user_dashboard.php">
                My Bookings
              </a>
            </li>
          <?php endif; ?>

          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <a class="btn btn-sm btn-danger" href="../admin-panel/logout.php">
              Logout
            </a>
          </li>

        <?php else: ?>

          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <a class="btn btn-sm btn-outline-light" href="../admin-panel/login.php">
              Login
            </a>
          </li>

          <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
            <a class="btn btn-sm btn-accent" href="../admin-panel/register.php">
              Register
            </a>
          </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>


    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-4">Contact Railway System</h1>
                    <p class="lead mb-4">
                        Get in touch with us for bookings, inquiries, or assistance. 
                        Our team is always ready to help you with your railway travel needs.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <span class="badge bg-warning text-dark px-3 py-2">📞 24/7 Support</span>
                        <span class="badge bg-warning text-dark px-3 py-2">🚆 Quick Response</span>
                        <span class="badge bg-warning text-dark px-3 py-2">💬 Multiple Channels</span>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="bg-warning rounded-circle p-4 d-inline-block">
                        <span style="font-size: 3rem;">📞</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT METHODS -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                
                <!-- Phone Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card text-center p-4">
                        <div class="contact-icon mx-auto">
                            📞
                        </div>
                        <h4 class="fw-bold mb-3">Call Us</h4>
                        <p class="text-muted mb-3">
                            Speak directly with our customer service team for immediate assistance
                        </p>
                        <div class="h5 text-warning fw-bold">021-111-RAIL</div>
                        <small class="text-muted">Toll Free: 0800-RAILWAY</small>
                        <div class="mt-3">
                            <small class="text-muted">Available 24/7</small>
                        </div>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card text-center p-4">
                        <div class="contact-icon mx-auto">
                            ✉️
                        </div>
                        <h4 class="fw-bold mb-3">Email Us</h4>
                        <p class="text-muted mb-3">
                            Send us your queries and we'll respond within 2 hours
                        </p>
                        <div class="h6 text-warning fw-bold">info@railwaysystem.pk</div>
                        <div class="h6 text-warning fw-bold">support@railwaysystem.pk</div>
                        <div class="mt-3">
                            <small class="text-muted">Quick response guaranteed</small>
                        </div>
                    </div>
                </div>

                <!-- Visit Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card text-center p-4">
                        <div class="contact-icon mx-auto">
                            🏢
                        </div>
                        <h4 class="fw-bold mb-3">Visit Us</h4>
                        <p class="text-muted mb-3">
                            Visit our headquarters or any major railway station
                        </p>
                        <div class="h6 text-warning fw-bold">Railway Headquarters</div>
                        <small class="text-muted">Karachi Station, Pakistan</small>
                        <div class="mt-3">
                            <small class="text-muted">Mon-Sun: 8:00 AM - 10:00 PM</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CONTACT FORM & MAP -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-5">
                
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="contact-card p-4">
                        <h3 class="fw-bold mb-4">Send us a Message</h3>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email Address</label>
                                    <input type="email" class="form-control" placeholder="your@email.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Phone Number</label>
                                    <input type="tel" class="form-control" placeholder="0300-1234567">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Subject</label>
                                    <select class="form-select">
                                        <option selected>Select inquiry type</option>
                                        <option>Ticket Booking</option>
                                        <option>Cancelation</option>
                                        <option>Refund Request</option>
                                        <option>Complaint</option>
                                        <option>General Inquiry</option>
                                        <option>Group Booking</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Message</label>
                                    <textarea class="form-control" rows="5" placeholder="Describe your inquiry in detail..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning btn-lg w-100">
                                        🚆 Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Map & Stations -->
                <div class="col-lg-6">
                    <!-- Map -->
                    <div class="map-container mb-4">
                        <img src="https://images.pexels.com/photos/21014/pexels-photo.jpg" 
                             class="img-fluid w-100" alt="Railway Map" style="height: 250px; object-fit: cover;">
                    </div>
                    
                    <!-- Major Stations -->
                    <h4 class="fw-bold mb-4">Major Railway Stations</h4>
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <div class="station-card">
                                <h6 class="fw-bold">🚉 Karachi Station</h6>
                                <small>021-111-RAIL</small><br>
                                <small>Station Road, Karachi</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="station-card">
                                <h6 class="fw-bold">🚉 Lahore Junction</h6>
                                <small>042-111-RAIL</small><br>
                                <small>Lahore Railway Station</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="station-card">
                                <h6 class="fw-bold">🚉 Islamabad</h6>
                                <small>051-111-RAIL</small><br>
                                <small>Islamabad Station</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="station-card">
                                <h6 class="fw-bold">🚉 Rawalpindi</h6>
                                <small>051-222-RAIL</small><br>
                                <small>Rawalpindi Station</small>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="text-muted">Quick answers to common questions</p>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-card p-4">
                        <div class="accordion" id="faqAccordion">
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        🎫 How can I book train tickets online?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        You can book tickets through our website, mobile app, or by calling our helpline. 
                                        Online booking is available 24/7 with instant confirmation.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        💰 What is your cancellation policy?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Cancellations are allowed up to 4 hours before departure with 90% refund. 
                                        Between 1-4 hours, 50% refund. Less than 1 hour, no refund.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        🕒 What are your customer service hours?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Our phone support is available 24/7. Station offices are open from 8:00 AM to 10:00 PM, 
                                        7 days a week including holidays.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
                    <p class="text-muted small mb-0 mt-1">Always Here to Help You Travel Better</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <span class="text-warning">Support</span> • 
                        <span class="text-warning">Service</span> • 
                        <span class="text-warning">Satisfaction</span>
                    </p>
                </div>
            </div>
        </div>
    </footer> -->
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

<!-- Booking Modal -->
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
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>