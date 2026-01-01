<?php
require '../connect.php';
session_start();

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect if not logged in or not admin
if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin'){
    header("Location: login.php");
    exit;
}

// Fetch bookings
$rows = $pdo->query("SELECT * FROM railway ORDER BY booking_time DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin - Bookings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { margin:0; font-family: Arial, sans-serif; background:#1f2937; color:white; }
    .admin-sidebar { position: fixed; top:0; left:0; height:100vh; width:220px; background: linear-gradient(180deg,#111827,#1f2937); display:flex; flex-direction:column; padding-top:20px; z-index:1100; }
    .admin-sidebar-logo { text-align:center; margin-bottom:20px; }
    .admin-sidebar-logo img { width:120px; }
    .admin-sidebar a { color:#fff; padding:15px 20px; text-decoration:none; margin-bottom:5px; border-radius:5px; display:block; transition:0.3s; }
    .admin-sidebar a:hover, .admin-sidebar a.active { background:#ffc107; color:#000; font-weight:bold; }
    .admin-sidebar-bottom { margin-top:auto; padding:15px; display:flex; flex-direction:column; gap:10px; }
    .admin-sidebar-bottom a { text-align:center; }
    .admin-topbar { position: fixed; left:220px; right:0; top:0; height:60px; background:#111827; border-bottom:1px solid #333; padding:15px 20px; font-weight:bold; z-index:1000; }
    .admin-main-content { margin-left:220px; margin-top:60px; padding:20px; }
    .table-responsive { background:#111827; border-radius:10px; overflow-x:auto; }
    table { color:white; }
    table th { background:#4f46e5; color:white; }
    table td { background:#1f2937; color:white; }
    .badge { font-weight:bold; }
    .btn { transition:0.3s; }
    .btn:hover { opacity:0.8; }
    @media (max-width:768px){ .admin-sidebar { width:100%; height:auto; position:relative; } .admin-topbar { left:0; } .admin-main-content { margin-left:0; } }
  </style>
</head>
<body>

<div class="admin-sidebar">
  <div class="admin-sidebar-logo">
  <a class="" href="#">
          🚆 Railway<span class="text-warning">System</span>
        </a>
  </div>
  <a href="index.php">🏠 Dashboard</a>
  <a href="trains.php">🚆 Trains</a>
  <a href="bookings.php" class="active">📋 Bookings</a>

  <div class="admin-sidebar-bottom">
    <a href="/railway_project/index.php" class="btn btn-warning w-100 text-dark fw-bold">⬅ Go to Home</a>
    <a href="logout.php" class="btn btn-danger w-100 fw-bold">🚪 Logout</a>
  </div>
</div>

<div class="admin-topbar">Manage Bookings</div>

<div class="admin-main-content">
  <h3>All Bookings</h3>
  <p>View and manage all ticket bookings here.</p>

  <div class="table-responsive mt-3">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>#</th><th>Route</th><th>Train</th><th>Class</th><th>Date</th><th>Time</th>
          <th>Passenger</th><th>Seats</th><th>Price</th><th>Payment</th><th>Payment Details</th><th>Status</th><th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rows as $r): ?>
        <tr>
          <td><?=htmlspecialchars($r['id'])?></td>
          <td><?=htmlspecialchars($r['route'])?></td>
          <td><?=htmlspecialchars($r['train_name'])?></td>
          <td><?=htmlspecialchars($r['class'])?></td>
          <td><?=htmlspecialchars($r['travel_date'])?></td>
          <td><?=htmlspecialchars($r['train_time'])?></td>
          <td><?=htmlspecialchars($r['passenger_name'])?></td>
          <td><?=htmlspecialchars($r['seats'])?></td>
          <td>Rs. <?=number_format($r['price'],2)?></td>
          <td><?=htmlspecialchars($r['payment_method'])?></td>
          <td>
            <?php
            if($r['payment_method']=='card'){
                echo 'Card: '.htmlspecialchars($r['stripe_card_number']).'<br>';
                echo 'Expiry: '.htmlspecialchars($r['stripe_expiry']).'<br>';
                echo 'CVV: '.htmlspecialchars($r['stripe_cvv']);
            } elseif($r['payment_method']=='bank' || $r['payment_method']=='wallet'){
                echo 'Mobile: '.htmlspecialchars($r['jazz_mobile']).'<br>';
                echo 'Txn Ref: '.htmlspecialchars($r['jazz_tran_ref']).'<br>';
                echo 'Txn ID: '.htmlspecialchars($r['jazz_txn_id']);
            } else {
                echo '-';
            }
            ?>
          </td>
          <td>
            <span class="badge <?= $r['status']=='Confirmed'?'bg-success':'bg-danger' ?>">
              <?=htmlspecialchars($r['status'])?>
            </span>
          </td>
          <td style="white-space:nowrap;">
            <a href="view_booking.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">View</a>
            <a href="download_ticket.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-success">Download</a>
            <a href="update_booking.php?id=<?= $r['id'] ?>&action=confirm" class="btn btn-sm btn-success">Confirm</a>
            <a href="update_booking.php?id=<?= $r['id'] ?>&action=cancel" class="btn btn-sm btn-warning">Cancel</a>
            <a href="delete_booking.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete booking?')">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Prevent back-button cached page -->
<script>
window.addEventListener('pageshow', function(event) {
    if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
        window.location.reload();
    }
});
</script>

</body>
</html>
