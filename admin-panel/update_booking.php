<?php
// admin-panel/update_booking.php
require '../connect.php';

$id = (int)($_GET['id'] ?? 0);
$action = $_GET['action'] ?? '';

if ($id <= 0) { 
    header('Location: bookings.php'); 
    exit; 
}

$new = null;
if ($action === 'confirm') $new = 'confirmed';
if ($action === 'cancel')  $new = 'cancelled';

if ($new) {
    $stmt = $pdo->prepare("UPDATE railway SET status = :s WHERE id = :id");
    $stmt->execute([':s' => $new, ':id' => $id]);
    header('Location: bookings.php?msg=Status+updated');
    exit;
}

header('Location: bookings.php');
exit;
