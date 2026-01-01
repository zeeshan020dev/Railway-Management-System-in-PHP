<?php
// admin-panel/download_ticket.php
require '../connect.php';

// If using composer autoload for dompdf:
require '../dompdf/vendor/autoload.php'; // adjust if different

use Dompdf\Dompdf;

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM railway WHERE id = :id");
$stmt->execute([':id'=>$id]);
$b = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$b) { echo "Booking not found"; exit; }

// Build HTML for ticket (style it as you like)
$html = '
<html><head><meta charset="utf-8"><style>
body{font-family: Arial; padding:20px}
.header{display:flex;align-items:center;justify-content:space-between}
.logo{font-size:20px;font-weight:700}
.card{border:1px solid #ddd;padding:16px;border-radius:8px}
.table{width:100%;margin-top:10px}
.table td{padding:6px;border-bottom:1px dashed #eee}
</style></head><body>
<div class="header"><div class="logo">🚆 Railway System</div><div>Ticket #'.htmlspecialchars($b['id']).'</div></div>
<h4>Passenger: '.htmlspecialchars($b['passenger_name']).'</h4>
<div class="card">
<table class="table">
<tr><td>Route</td><td>'.htmlspecialchars($b['route']).'</td></tr>
<tr><td>Train</td><td>'.htmlspecialchars($b['train_name']).'</td></tr>
<tr><td>Class</td><td>'.htmlspecialchars($b['class']).'</td></tr>
<tr><td>Date</td><td>'.htmlspecialchars($b['travel_date']).'</td></tr>
<tr><td>Time</td><td>'.htmlspecialchars($b['train_time']).'</td></tr>
<tr><td>Seats</td><td>'.htmlspecialchars($b['seats']).'</td></tr>
<tr><td>Price</td><td>Rs. '.number_format($b['price'],2).'</td></tr>
<tr><td>Payment</td><td>'.htmlspecialchars($b['payment_method']).'</td></tr>
<tr><td>CNIC</td><td>'.htmlspecialchars($b['cnic']).'</td></tr>
</table>
</div>
<p style="margin-top:12px;font-size:12px;color:#666">Booked at: '.htmlspecialchars($b['booking_time']).'</p>
</body></html>';

// instantiate and render
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf->render();

// Optionally save file to server:
$output = $dompdf->output();
$filename = 'ticket_'.$b['id'].'.pdf';
$filePath = __DIR__ . '/uploads/tickets/'.$filename;
if (!is_dir(dirname($filePath))) mkdir(dirname($filePath),0777,true);
file_put_contents($filePath, $output);

// Stream to browser (download)
$dompdf->stream($filename, ["Attachment" => 1]);
exit;
