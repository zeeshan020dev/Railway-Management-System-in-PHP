<?php
require '../connect.php';
session_start();

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect if not logged in or not admin
if(!isset($_SESSION['user_id']) || $_SESSION['role']!=='admin'){
    header("Location: login.php");
    exit;
}

// Auto-logout after 30 seconds of inactivity
$timeout_duration = 30;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php?msg=Session expired");
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time();

// Dashboard stats
$total_trains = $pdo->query("SELECT COUNT(*) FROM trains")->fetchColumn();
$confirmed = $pdo->query("SELECT COUNT(*) FROM railway WHERE status='Confirmed'")->fetchColumn();
$cancelled = $pdo->query("SELECT COUNT(*) FROM railway WHERE status='Cancelled'")->fetchColumn();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
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
.card { border-radius:12px; box-shadow:0 3px 10px rgba(0,0,0,0.2); background: linear-gradient(135deg,#4f46e5,#3b82f6); color:white; text-align:center; transition:0.3s; }
.card:hover { transform:translateY(-5px); }
@media (max-width:768px){ .admin-sidebar { width:100%; height:auto; position:relative; } .admin-topbar { left:0; } .admin-main-content { margin-left:0; } }
</style>
</head>
<body>

<div class="admin-sidebar">
<a class="" href="#">🚆 Railway<span class="text-warning">System</span></a>
<a href="index.php" class="active">🏠 Dashboard</a>
<a href="trains.php">🚆 Trains</a>
<a href="bookings.php">📋 Bookings</a>
<div class="admin-sidebar-bottom">
<a href="/railway_project/index.php" class="btn btn-warning w-100 text-dark fw-bold">⬅ Go to Home</a>
<a href="logout.php" class="btn btn-danger w-100 fw-bold">🚪 Logout</a>
</div>
</div>

<div class="admin-topbar">Railway Management Admin Panel</div>

<div class="admin-main-content">
<h3>Dashboard</h3>
<div class="row mt-4">
  <div class="col-md-4 mb-4"><div class="card p-4"><h6>Total Trains</h6><h3><?= $total_trains ?></h3></div></div>
  <div class="col-md-4 mb-4"><div class="card p-4"><h6>Confirmed Tickets</h6><h3><?= $confirmed ?></h3></div></div>
  <div class="col-md-4 mb-4"><div class="card p-4"><h6>Cancelled Tickets</h6><h3><?= $cancelled ?></h3></div></div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Auto logout alert + redirect after 30s
setTimeout(function() {
    alert('Session expired! You will be logged out.');
    window.location.href = 'logout.php';
}, 30000);

// Prevent back-button cached page after logout
window.addEventListener('pageshow', function(event) {
    if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
        window.location.reload();
    }
});
</script>

</body>
</html>
