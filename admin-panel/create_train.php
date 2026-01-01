<?php
require '../connect.php';

// 
// helper
function clean($v){ return trim($v); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); echo 'Method not allowed'; exit;
}

// collect + sanitize
$route_id     = isset($_POST['route_id']) ? (int) $_POST['route_id'] : 0;
$train_name   = clean($_POST['train_name'] ?? '');
$class        = clean($_POST['class'] ?? '');
$price        = isset($_POST['price']) ? (float) str_replace(',', '', $_POST['price']) : null;
$depart_time  = clean($_POST['depart_time'] ?? '');
$travel_date  = clean($_POST['travel_date'] ?? null);
$seats        = isset($_POST['seats']) ? (int) $_POST['seats'] : 0;

// ----------------------------
// IMAGE VALIDATION + UPLOAD
// ----------------------------
$imageName = null;

if (!empty($_FILES['image']['name'])) {

    $allowed_types = ['image/jpeg','image/png','image/webp','image/jpg'];
    $file_type = $_FILES['image']['type'];
    $file_tmp  = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];

    // validate type
    if (!in_array($file_type, $allowed_types)) {
        die("Invalid image type. Only JPG, PNG, WEBP allowed.");
    }

    // validate size (max 3MB)
    if ($file_size > 3 * 1024 * 1024) {
        die("Image size too large. Max 3MB allowed.");
    }

    // generate unique filename
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = time() . '_' . rand(1000,9999) . '.' . $ext;

    // move file
    $uploadPath = __DIR__ . "/uploads/" . $imageName;

    if (!move_uploaded_file($file_tmp, $uploadPath)) {
        die("Failed to upload image.");
    }
}

// ----------------------------
// VALIDATION
// ----------------------------
$errors = [];
if ($route_id <= 0) $errors[] = 'Route is required';
if ($train_name === '') $errors[] = 'Train name is required';
if (!in_array($class, ['Business','Economy','AC Sleeper','AC Standard'], true)) $errors[] = 'Invalid class';
if ($price === null || $price < 0) $errors[] = 'Invalid price';
if ($depart_time === '' || !preg_match('/^\d{2}:\d{2}(:\d{2})?$/', $depart_time)) $errors[] = 'Invalid departure time';
if ($seats < 0) $errors[] = 'Invalid seats';

if (!empty($errors)) {
    echo '<h3>Errors:</h3><ul><li>'.implode('</li><li>', $errors).'</li></ul>';
    exit;
}

// check if route exists
$stmt = $pdo->prepare("SELECT id FROM routes WHERE id = :id");
$stmt->execute([':id' => $route_id]);
$route = $stmt->fetch();
if (!$route) {
    die('Selected route is not allowed.');
}

// ----------------------------
// INSERT DATA
// ----------------------------
$sql = "INSERT INTO trains (route_id, train_name, class, price, depart_time, travel_date, seats, image)
        VALUES (:route_id, :train_name, :class, :price, :depart_time, :travel_date, :seats, :image)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':route_id'    => $route_id,
    ':train_name'  => $train_name,
    ':class'       => $class,
    ':price'       => $price,
    ':depart_time' => $depart_time,
    ':travel_date' => $travel_date ?: null,
    ':seats'       => $seats,
    ':image'       => $imageName
]);

header('Location: trains.php?created=1');
exit;
?>
