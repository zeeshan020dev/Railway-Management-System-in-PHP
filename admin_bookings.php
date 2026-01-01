<?php
require 'connect.php';
$rows = $pdo->query("SELECT * FROM railway ORDER BY booking_time DESC")->fetchAll();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bookings - Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h3>All Bookings</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Route</th>
        <th>Train</th>
        <th>Class</th>
        <th>Date</th>
        <th>Time</th>
        <th>Passenger</th>
        <th>Seats</th>
        <th>Phone</th>
        <th>Price</th>
        <th>Booking Time</th>
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
        <td><?=htmlspecialchars($r['phone'])?></td>
        <td><?=htmlspecialchars($r['price'])?></td>
        <td><?=htmlspecialchars($r['booking_time'])?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>
