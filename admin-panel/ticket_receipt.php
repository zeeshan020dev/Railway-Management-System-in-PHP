<?php
require '../connect.php';  // Database connection
require '../dompdf/autoload.inc.php'; // DomPDF

use Dompdf\Dompdf;

// 1. Booking ID from URL
$booking_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if(!$booking_id) die('Booking ID missing');

// 2. Fetch booking details from 'railway' table
$stmt = $pdo->prepare("SELECT * FROM railway WHERE id=:id");
$stmt->execute([':id'=>$booking_id]);
$booking = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$booking) die('Booking not found');

// 3. Prepare HTML content for PDF
$html = '
<h2 style="text-align:center;">Railway Ticket Receipt</h2>
<table style="width:100%; border-collapse: collapse;" border="1">
<tr><th>Passenger Name</th><td>'.htmlspecialchars($booking['passenger_name']).'</td></tr>
<tr><th>Route</th><td>'.htmlspecialchars($booking['route']).'</td></tr>
<tr><th>Train</th><td>'.htmlspecialchars($booking['train_name']).'</td></tr>
<tr><th>Class</th><td>'.htmlspecialchars($booking['class']).'</td></tr>
<tr><th>Seats</th><td>'.htmlspecialchars($booking['seats']).'</td></tr>
<tr><th>Price</th><td>Rs. '.number_format($booking['price']).'</td></tr>
<tr><th>Travel Date</th><td>'.htmlspecialchars($booking['travel_date']).'</td></tr>
<tr><th>Train Time</th><td>'.htmlspecialchars($booking['train_time']).'</td></tr>
<tr><th>Booking Time</th><td>'.htmlspecialchars($booking['booking_time']).'</td></tr>
<tr><th>Status</th><td>'.htmlspecialchars($booking['status']).'</td></tr>
</table>
';

// 4. Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// 5. Download PDF
$dompdf->stream("ticket_".$booking['id'].".pdf", ["Attachment" => true]);
exit;
?>
