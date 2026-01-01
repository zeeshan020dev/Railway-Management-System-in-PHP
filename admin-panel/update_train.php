<?php
require '../connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Invalid request');
}

$id          = (int)$_POST['id'];
$route_id    = (int)$_POST['route_id'];
$train_name  = trim($_POST['train_name']);
$class       = $_POST['class'];
$price       = (float)$_POST['price'];
$depart_time = $_POST['depart_time'];
$seats       = (int)$_POST['seats'];

// Handle image upload
$imageName = null;
if (!empty($_FILES['image']['name'])) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = time() . '_' . rand(1000,9999) . '.' . $ext;
    $uploadPath = __DIR__ . "/uploads/" . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
}

// Update query
$sql = "UPDATE trains SET route_id=:route_id, train_name=:train_name, class=:class, price=:price, depart_time=:depart_time, seats=:seats";
if($imageName) $sql .= ", image=:image";
$sql .= " WHERE id=:id";

$stmt = $pdo->prepare($sql);
$params = [
    ':route_id' => $route_id,
    ':train_name' => $train_name,
    ':class' => $class,
    ':price' => $price,
    ':depart_time' => $depart_time,
    ':seats' => $seats,
    ':id' => $id
];
if($imageName) $params[':image'] = $imageName;

$stmt->execute($params);

header('Location: trains.php?updated=1');
exit;
?>
