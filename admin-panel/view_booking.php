<?php
require '../connect.php';
$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM railway WHERE id = :id");
$stmt->execute([':id'=>$id]);
$r = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$r) { echo "Not found"; exit; }
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Booking #<?= $r['id'] ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-4">
  <div class="container">
    <h3>Booking #<?= $r['id'] ?></h3>
    <table class="table">
      <tr><th>Route</th><td><?=htmlspecialchars($r['route'])?></td></tr>
      <tr><th>Train</th><td><?=htmlspecialchars($r['train_name'])?></td></tr>
      <tr><th>Class</th><td><?=htmlspecialchars($r['class'])?></td></tr>
      <tr><th>Date</th><td><?=htmlspecialchars($r['travel_date'])?></td></tr>
      <tr><th>Time</th><td><?=htmlspecialchars($r['train_time'])?></td></tr>
      <tr><th>Passenger</th><td><?=htmlspecialchars($r['passenger_name'])?></td></tr>
      <tr><th>CNIC</th><td><?=htmlspecialchars($r['cnic'])?></td></tr>
      <tr><th>Phone</th><td><?=htmlspecialchars($r['phone'])?></td></tr>
      <tr><th>Seats</th><td><?=htmlspecialchars($r['seats'])?></td></tr>
      <tr><th>Price</th><td>Rs. <?=number_format($r['price'],2)?></td></tr>
      <tr><th>Special</th><td><?=nl2br(htmlspecialchars($r['special_requests']))?></td></tr>
      <tr><th>Status</th><td><?=htmlspecialchars($r['status'])?></td></tr>
      <tr><th>Booked at</th><td><?=htmlspecialchars($r['booking_time'])?></td></tr>
    </table>

    <a class="btn btn-primary" href="download_ticket.php?id=<?= $r['id'] ?>" target="_blank">Download Ticket</a>
    <a class="btn btn-secondary" href="bookings.php">Back</a>
  </div>
</body></html>
