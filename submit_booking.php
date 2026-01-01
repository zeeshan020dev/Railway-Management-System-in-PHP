<?php
session_start();
require 'connect.php';

function clean($v){ return trim($v); }

// Only POST allowed
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method not allowed';
    exit;
}

// Check if user is logged in
if(!isset($_SESSION['user_id'])){
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];

// Clean inputs
$route = clean($_POST['route'] ?? '');
$train_name = clean($_POST['train_name'] ?? '');
$class = clean($_POST['class'] ?? '');
$price_input = isset($_POST['price']) ? (float) str_replace(',', '', $_POST['price']) : 0;
$price = (int) ($price_input * 100);

$travel_date = clean($_POST['travel_date'] ?? '');
$train_time = clean($_POST['train_time'] ?? '');
$passenger_name = clean($_POST['passenger_name'] ?? '');
$cnic = clean($_POST['cnic'] ?? '');
$email = clean($_POST['email'] ?? '');
$phone = clean($_POST['phone'] ?? '');
$seats = (int)($_POST['seats'] ?? 1);
$payment_method = clean($_POST['payment_method'] ?? '');
$special_requests = clean($_POST['special_requests'] ?? '');

// Stripe fields
$stripe_card_number = clean($_POST['stripe_card_number'] ?? '');
$stripe_expiry = clean($_POST['stripe_expiry'] ?? '');
$stripe_cvv = clean($_POST['stripe_cvv'] ?? '');

// JazzCash fields
$jazz_mobile = clean($_POST['jazz_mobile'] ?? '');
$jazz_txn_id = clean($_POST['jazz_txn_id'] ?? '');

/* -----------------------------------------------------------------
   VALIDATION — ensure no required field is empty
----------------------------------------------------------------- */
$errors = [];

// REQUIRED FIELDS
$requiredFields = [
    'Route' => $route,
    'Train Name' => $train_name,
    'Class' => $class,
    'Travel Date' => $travel_date,
    'Train Time' => $train_time,
    'Passenger Name' => $passenger_name,
    'CNIC' => $cnic,
    'Email' => $email,
    'Payment Method' => $payment_method,
];

// Payment-specific validation
if($payment_method === 'stripe'){
    if(!$stripe_card_number) $errors[] = "Stripe Card Number is required";
    if(!$stripe_expiry) $errors[] = "Stripe Expiry Date is required";
    if(!$stripe_cvv) $errors[] = "Stripe CVV is required";
}
if($payment_method === 'jazzcash'){
    if(!$jazz_mobile) $errors[] = "JazzCash Mobile Number is required";
    if(!$jazz_txn_id) $errors[] = "JazzCash Transaction ID is required";
}

// Validate other required fields
foreach ($requiredFields as $field => $value) {
    if (!$value) $errors[] = "$field is required";
}

// Seats must be > 0
if ($seats < 1) $errors[] = "Seats must be at least 1";

if (!empty($errors)) {
    $msg = implode("\\n", $errors);
    echo "<script>alert('Errors:\\n$msg'); window.history.back();</script>";
    exit;
}

/* -----------------------------------------------------------------
   1. GET TRAIN INFO
----------------------------------------------------------------- */
$trainStmt = $pdo->prepare("
    SELECT * FROM trains 
    WHERE train_name = :train_name 
      AND class = :class 
    LIMIT 1
");
$trainStmt->execute([
    ':train_name' => $train_name,
    ':class' => $class
]);
$train = $trainStmt->fetch(PDO::FETCH_ASSOC);

if(!$train){
    echo "<script>alert('Train not found'); window.history.back();</script>";
    exit;
}

$available_seats = (int)$train['seats'];

if($seats > $available_seats){
    echo "<script>alert('Not enough seats available. Only $available_seats seats left.'); window.history.back();</script>";
    exit;
}

/* -----------------------------------------------------------------
   2. INSERT BOOKING
----------------------------------------------------------------- */
$sql = "INSERT INTO railway
(user_id, route, train_name, class, price, travel_date, train_time, passenger_name, cnic, email, phone, seats, payment_method,
 stripe_card_number, stripe_expiry, stripe_cvv, jazz_mobile, jazz_txn_id, special_requests)
VALUES
(:user_id, :route, :train_name, :class, :price, :travel_date, :train_time, :passenger_name, :cnic, :email, :phone, :seats, :payment_method,
 :stripe_card_number, :stripe_expiry, :stripe_cvv, :jazz_mobile, :jazz_txn_id, :special_requests)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':user_id' => $user_id,
    ':route' => $route,
    ':train_name' => $train_name,
    ':class' => $class,
    ':price' => $price,
    ':travel_date' => $travel_date,
    ':train_time' => $train_time,
    ':passenger_name' => $passenger_name,
    ':cnic' => $cnic,
    ':email' => $email,
    ':phone' => $phone,
    ':seats' => $seats,
    ':payment_method' => $payment_method,
    ':stripe_card_number' => $stripe_card_number,
    ':stripe_expiry' => $stripe_expiry,
    ':stripe_cvv' => $stripe_cvv,
    ':jazz_mobile' => $jazz_mobile,
    ':jazz_txn_id' => $jazz_txn_id,
    ':special_requests' => $special_requests
]);

/* -----------------------------------------------------------------
   3. UPDATE REMAINING SEATS
----------------------------------------------------------------- */
$newSeats = $available_seats - $seats;
$update = $pdo->prepare("UPDATE trains SET seats = :seats WHERE id = :id");
$update->execute([':seats' => $newSeats, ':id' => $train['id']]);

/* -----------------------------------------------------------------
   4. REDIRECT TO USER DASHBOARD
----------------------------------------------------------------- */
echo "<script>
    alert('Ticket booked successfully!');
    window.location='./admin-panel/user_dashboard.php';
</script>";
exit;
?>
