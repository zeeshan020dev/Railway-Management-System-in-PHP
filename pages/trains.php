<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Trains - Railway System</title>
 <link rel="stylesheet" href="../main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../main.css" />
    <style>
.pro-slider-container {
  position: relative;
  width: 100%;
  height: 500px;
  overflow: hidden;
  border-radius: 12px;
  background-color: #000;
}

.pro-slider-wrapper {
  display: flex;
  height: 100%;
  transition: transform 0.8s ease-in-out;
}

.pro-slide {
  min-width: 100%;
  height: 100%;
}

.pro-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;       /* FIX: Image fills full width & height */
  object-position: center; /* Best crop */
  display: block;
}

/* Buttons */
.pro-btn-prev, .pro-btn-next {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(0,0,0,0.5);
  color: white;
  border: none;
  padding: 10px 16px;
  font-size: 30px;
  border-radius: 50%;
  cursor: pointer;
  z-index: 10;
}
.pro-btn-prev { left: 15px; }
.pro-btn-next { right: 15px; }

/* Dots */
.pro-slider-dots {
  position: absolute;
  bottom: 15px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 10px;
}

.pro-dot {
  width: 12px;
  height: 12px;
  background: rgba(255,255,255,0.5);
  border-radius: 50%;
  cursor: pointer;
}

.pro-dot.active {
  background: #fff;
}
</style>

</head>
<body class="bg-light">

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
              <a class="nav-link "  href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="trains.php">Trains</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="contact.php">Contact</a>
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
    <div class="pro-slider-container">
  <div class="pro-slider-wrapper">
    <div class="pro-slide">
      <img src="../photos/Bussniness/jinnah.png" alt="Slide 1">
    </div>

    <div class="pro-slide">
      <img src="../photos/Bussniness/mutlan.jpg" alt="Slide 2">
    </div>

    <div class="pro-slide">
      <img src="../photos/Bussniness/jaffar.jpeg" alt="Slide 3">
    </div>
  </div>

  <!-- Navigation buttons -->
  <button class="pro-btn-prev">&#10094;</button>
  <button class="pro-btn-next">&#10095;</button>

  <!-- Dots -->
  <div class="pro-slider-dots">
    <div class="pro-dot active" data-slide="0"></div>
    <div class="pro-dot" data-slide="1"></div>
    <div class="pro-dot" data-slide="2"></div>
  </div>
</div>



    <!-- TRAINS GRID SECTION -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h3 fw-bold">All Available Trains</h2>
                <p class="text-muted">Choose from our wide range of trains serving all major routes</p>
            </div>

            <div class="row g-3">
                
                <!-- Train 1 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="train-card">
                        <div >
                            <img src="../photos/AC Standard/deluxe.jpeg"/>
                            <span class="route-badge">KHI → LHR</span>
                        </div>
                        <div class="train-info">
                            <div class="train-name">Green Line Express</div>
                            <div class="train-timing">08:00 - 22:00</div>
                            <span class="train-class class-business">Business</span>
                        </div>
                    </div>
                </div>

                <!-- Train 2 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="train-card">
                        <div class="train-image" style="background-image: url('../photos/Bussniness/green.webp'); height: 190px;">
                            <span class="route-badge">ISB → KHI</span>
                        </div>
                        <div class="train-info">
                            <div class="train-name">Jinnah Express</div>
                            <div class="train-timing">10:30 - 01:30</div>
                            <span class="train-class class-business">Business</span>
                        </div>
                    </div>
                </div>

                <!-- Train 3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="train-card">
                        <div class="train-image" style="background-image: url('../photos/Economy/Green.jpg'); height: 190px;">
                            <span class="route-badge">LHR → RWP</span>
                        </div>
                        <div class="train-info">
                            <div class="train-name">Islamabad Express</div>
                            <div class="train-timing">07:45 - 12:10</div>
                            <span class="train-class class-economy">Economy</span>
                        </div>
                    </div>
                </div>

                <!-- Train 4 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="train-card">
                        <div class="train-image" style="background-image: url('../photos/AC Standard/express.jpeg'); height: 190px;">
                            <span class="route-badge">QTA → RWP</span>
                        </div>
                        <div class="train-info">
                            <div class="train-name">Quetta Express</div>
                            <div class="train-timing">13:00 - 05:00</div>
                            <span class="train-class class-ac">AC Sleeper</span>
                        </div>
                    </div>
                </div>

                <!-- Train 5 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="train-card">
                        <div class="train-image" style="background-image: url('../photos/Bussniness/islamabad.jpg');  height: 190px;">
                            <span class="route-badge">MUL → KHI</span>
                        </div>
                        <div class="train-info">
                            <div class="train-name">Multan Express</div>
                            <div class="train-timing">15:40 - 07:30</div>
                            <span class="train-class class-business">Business</span>
                        </div>
                    </div>
                </div>

                <!-- Train 6 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="train-card">
                        <div class="train-image" style="background-image: url('../photos/Economy/iqbal.jpeg'); height: 190px;">
                            <span class="route-badge">FSD → LHR</span>
                        </div>
                        <div class="train-info">
                            <div class="train-name">Faisal Express</div>
                            <div class="train-timing">11:20 - 13:50</div>
                            <span class="train-class class-economy">Economy</span>
                        </div>
                    </div>
                </div>

                <!-- Train 7 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="train-card">
                        <div class="train-image" style="background-image: url('../photos/AC Standard/isl.jpeg'); height: 190px;">
                            <span class="route-badge">KHI → HYD</span>
                        </div>
                        <div class="train-info">
                            <div class="train-name">Allama Iqbal Express</div>
                            <div class="train-timing">09:00 - 12:00</div>
                            <span class="train-class class-economy">Economy</span>
                        </div>
                    </div>
                </div>

                <!-- Train 8 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="train-card">
                        <div class="train-image" style="background-image: url('../photos/Bussniness/jaffar.jpeg'); height: 190px;">
                            <span class="route-badge">MUL → LHR</span>
                        </div>
                        <div class="train-info">
                            <div class="train-name">Shalimar Express</div>
                            <div class="train-timing">14:00 - 18:30</div>
                            <span class="train-class class-ac">AC Standard</span>
                        </div>
                    </div>
                </div>
  <!-- Train 9 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Economy/Lahore.jpg'); height: 190px;">
                        <span class="route-badge">RWP → FSD</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Pakistan Express</div>
                        <div class="train-timing">07:30 - 11:45</div>
                        <span class="train-class class-economy">Economy</span>
                    </div>
                </div>
            </div>

            <!-- Train 10 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/AC Standard/lahore.jpeg'); height: 190px;">
                        <span class="route-badge">LHR → KHI</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Tezgam Express</div>
                        <div class="train-timing">16:00 - 06:00</div>
                        <span class="train-class class-economy">Economy</span>
                    </div>
                </div>
            </div>

            <!-- Train 11 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Bussniness/jinnah.jpg')">
                        <span class="route-badge">PSH → LHR</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Khyber Mail</div>
                        <div class="train-timing">10:00 - 18:00</div>
                        <span class="train-class class-economy">Economy</span>
                    </div>
                </div>
            </div>

            <!-- Train 12 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Economy/mutlan.jpeg')">
                        <span class="route-badge">QTA → KHI</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Bolan Mail</div>
                        <div class="train-timing">19:00 - 07:00</div>
                        <span class="train-class class-economy">Economy</span>
                    </div>
                </div>
            </div>

            <!-- Train 13 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/AC Standard/sleeper.jpg')">
                        <span class="route-badge">KHI → ISB</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">AC Sleeper Premium</div>
                        <div class="train-timing">18:00 - 10:00</div>
                        <span class="train-class class-ac">AC Sleeper</span>
                    </div>
                </div>
            </div>

            <!-- Train 14 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Bussniness/mutlan.jpg')">
                        <span class="route-badge">LHR → QTA</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Quetta AC Standard</div>
                        <div class="train-timing">21:00 - 14:30</div>
                        <span class="train-class class-ac">AC Standard</span>
                    </div>
                </div>
            </div>

            <!-- Train 15 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Economy/Pindi.jpeg')">
                        <span class="route-badge">RWP → KHI</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Rawal AC Sleeper</div>
                        <div class="train-timing">17:30 - 09:15</div>
                        <span class="train-class class-ac">AC Sleeper</span>
                    </div>
                </div>
            </div>

            <!-- Train 16 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/AC Standard/standard.jpeg')">
                        <span class="route-badge">FSD → LHR</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Lahore AC Standard</div>
                        <div class="train-timing">06:00 - 08:10</div>
                        <span class="train-class class-ac">AC Standard</span>
                    </div>
                </div>
            </div>

            <!-- Train 17 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Bussniness/pindi.jpg')">
                        <span class="route-badge">MUL → ISB</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">AC Deluxe Sleeper</div>
                        <div class="train-timing">20:00 - 08:00</div>
                        <span class="train-class class-ac">AC Deluxe</span>
                    </div>
                </div>
            </div>

            <!-- Train 18 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Economy/Quetta.jpeg')">
                        <span class="route-badge">HYD → KHI</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Hyderabad AC Special</div>
                        <div class="train-timing">22:30 - 00:45</div>
                        <span class="train-class class-ac">AC Standard</span>
                    </div>
                </div>
            </div>

            <!-- Train 19 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/AC Standard/sleeper.jpg')">
                        <span class="route-badge">KHI → PSH</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Khyber Express</div>
                        <div class="train-timing">12:00 - 08:00</div>
                        <span class="train-class class-sleeper">Sleeper</span>
                    </div>
                </div>
            </div>

            <!-- Train 20 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Bussniness/mutlan.jpg')">
                        <span class="route-badge">ISB → QTA</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Quetta Night Express</div>
                        <div class="train-timing">20:30 - 15:00</div>
                        <span class="train-class class-sleeper">Sleeper</span>
                    </div>
                </div>
            </div>

            <!-- Train 21 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Economy/mutlan.jpeg')">
                        <span class="route-badge">LHR → MUL</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Chenab Express</div>
                        <div class="train-timing">13:15 - 17:30</div>
                        <span class="train-class class-economy">Economy</span>
                    </div>
                </div>
            </div>

            <!-- Train 22 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/AC Standard/express.jpeg')">
                        <span class="route-badge">RWP → PSH</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Karakoram Express</div>
                        <div class="train-timing">09:45 - 16:20</div>
                        <span class="train-class class-business">Business</span>
                    </div>
                </div>
            </div>

            <!-- Train 23 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Bussniness/islamabad.jpg')">
                        <span class="route-badge">FSD → ISB</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Faisalabad Express</div>
                        <div class="train-timing">08:20 - 12:45</div>
                        <span class="train-class class-economy">Economy</span>
                    </div>
                </div>
            </div>

            <!-- Train 24 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="train-card">
                    <div class="train-image" style="background-image: url('../photos/Economy/iqbal.jpeg')">
                        <span class="route-badge">HYD → RWP</span>
                    </div>
                    <div class="train-info">
                        <div class="train-name">Sindh Express</div>
                        <div class="train-timing">14:30 - 06:45</div>
                        <span class="train-class class-sleeper">Sleeper</span>
                    </div>
                </div>
            </div>

     

            </div>
        </div>
    </section>

    <!-- INFORMATION SECTION -->
    <section class="info-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Pakistan's Most Reliable Railway Network</h2>
                    <p class="text-muted mb-4">
                        With over 24 trains serving 15+ major cities, we connect Pakistan like never before. 
                        From business class luxury to economy comfort, we have options for every traveler.
                    </p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="stats-card">
                                <div class="h3 text-warning mb-2">24+</div>
                                <h6>Active Trains</h6>
                                <p class="small text-muted mb-0">Serving nationwide routes</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="stats-card">
                                <div class="h3 text-warning mb-2">15+</div>
                                <h6>Cities Connected</h6>
                                <p class="small text-muted mb-0">Major destinations covered</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white rounded-3 p-4 shadow">
                        <h5 class="fw-bold mb-3">Why Choose Our Trains?</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">✅ <strong>Punctual Service:</strong> On-time departures and arrivals</li>
                            <li class="mb-2">✅ <strong>Multiple Classes:</strong> Business, Economy, AC & Sleeper options</li>
                            <li class="mb-2">✅ <strong>Comfortable Journey:</strong> Well-maintained coaches and facilities</li>
                            <li class="mb-2">✅ <strong>Safety First:</strong> 100% safety record with trained staff</li>
                            <li class="mb-2">✅ <strong>Nationwide Coverage:</strong> Connecting major cities across Pakistan</li>
                            <li>✅ <strong>Affordable Pricing:</strong> Options for every budget</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">Ready to Travel?</h3>
            <p class="lead mb-4">Book your ticket now and experience comfortable railway travel</p>
            <!-- <a href="index.html" class="btn btn-warning btn-lg px-5">
                🎫 Book Your Ticket
            </a> -->
            <a href="#" class="btn btn-warning btn-lg px-5" data-bs-toggle="modal" data-bs-target="#bookingModal">
   🎫 Book Your Ticket </a>


        </div>
    </section>

    <!-- FOOTER -->
    <!-- <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="fw-bold h5">🚆 Railway Management System</span>
                    <p class="text-muted small mb-0 mt-1">Connecting Pakistan, One Journey at a Time</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <span class="text-warning">24 Trains</span> • 
                        <span class="text-warning">15+ Cities</span> • 
                        <span class="text-warning">4 Travel Classes</span>
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

    <script>
const wrapper = document.querySelector('.pro-slider-wrapper');
const slides = document.querySelectorAll('.pro-slide');
const dots = document.querySelectorAll('.pro-dot');
let index = 0;

// Change slide
function goToSlide(i) {
  index = i;
  wrapper.style.transform = `translateX(-${i * 100}%)`;
  updateDots();
}

// Update dots
function updateDots() {
  dots.forEach(dot => dot.classList.remove('active'));
  dots[index].classList.add('active');
}

// Next button
document.querySelector('.pro-btn-next').onclick = () => {
  index = (index + 1) % slides.length;
  goToSlide(index);
};

// Prev button
document.querySelector('.pro-btn-prev').onclick = () => {
  index = (index - 1 + slides.length) % slides.length;
  goToSlide(index);
};

// Dot click
dots.forEach(dot => {
  dot.addEventListener('click', () => {
    goToSlide(parseInt(dot.dataset.slide));
  });
});

</script>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>