<?php
session_start();
require '../connect.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role']!=='user'){
    header("Location: login.php");
    exit;
}

$user_id=$_SESSION['user_id'];
$stmt=$pdo->prepare("SELECT * FROM railway WHERE user_id=? ORDER BY id DESC");
$stmt->execute([$user_id]);
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#1f2937;color:white;}
</style>
</head>
<body>

<div class="container mt-5">

<!-- ✅ Just Added Button – nothing else changed -->
<div class="text-end mb-3">
    <a href="../index.php" class="btn btn-sm btn-warning">⬅ Go to Home</a>
</div>

<h2 class="text-warning">My Bookings</h2>

<table class="table table-dark table-bordered mt-3">
<tr>
<th>#</th><th>Train</th><th>Route</th><th>Class</th><th>Date</th><th>Seats</th><th>Status</th><th>Action</th>
</tr>
<?php foreach($data as $i=>$b): ?>
<tr>
<td><?= $i+1 ?></td>
<td><?= $b['train_name'] ?></td>
<td><?= $b['route'] ?></td>
<td><?= $b['class'] ?></td>
<td><?= $b['travel_date'] ?></td>
<td><?= $b['seats'] ?></td>
<td><?= $b['status'] ?></td>
<td>
    <a href="download_ticket.php?id=<?= $b['id'] ?>" class="btn btn-sm btn-warning">Download</a>
</td>
</tr>
<?php endforeach; ?>
</table>

</div>

</body>
</html>
