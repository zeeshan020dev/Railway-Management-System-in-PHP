<?php
require '../connect.php';
session_start();

// Check if user is admin
if(!isset($_SESSION['user_id']) || $_SESSION['role']!=='admin'){
    header("Location: login.php");
    exit;
}

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

// Fetch routes for dropdown
$routes = $pdo->query("SELECT id, route_code, name FROM routes ORDER BY id")->fetchAll();

// Fetch trains
$trains = $pdo->query("
  SELECT t.*, r.route_code, r.name AS route_name 
  FROM trains t
  JOIN routes r ON t.route_id = r.id
  ORDER BY t.created_at ASC
")->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin - Trains</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { margin:0; font-family: Arial, sans-serif; background:#1f2937; color:white; }
    #trainForm .is-invalid { border-color: #dc3545 !important; }

    .admin-sidebar {
      position: fixed; top:0; left:0; height:100vh; width:220px;
      background: linear-gradient(180deg,#111827,#1f2937); display:flex; flex-direction:column; padding-top:20px; z-index:1100;
    }
    .admin-sidebar-logo { text-align:center; margin-bottom:20px; }
    .admin-sidebar-logo img { width:120px; }
    .admin-sidebar a { color:#fff; padding:15px 20px; text-decoration:none; margin-bottom:5px; border-radius:5px; display:block; transition:0.3s; }
    .admin-sidebar a:hover, .admin-sidebar a.active { background:#ffc107; color:#000; font-weight:bold; }
    .admin-sidebar-bottom { margin-top:auto; padding:15px; display:flex; flex-direction:column; gap:10px; }
    .admin-sidebar-bottom a { text-align:center; }

    .admin-topbar {
      position: fixed; left:220px; right:0; top:0; height:60px; background:#111827; border-bottom:1px solid #333; padding:15px 20px; font-weight:bold; z-index:1000;
    }

    .admin-main-content { margin-left:220px; margin-top:60px; padding:20px; }

    .table-responsive { background:#111827; border-radius:10px; overflow-x:auto; }
    table { color:white; }
    table th { background:#4f46e5; color:white; }
    table td { background:#1f2937; color:white; }
    .btn { transition:0.3s; }
    .btn:hover { opacity:0.8; }
    .table-action-btns { display:flex; gap:5px; flex-wrap:nowrap; }

    .modal-content { background:#1f2937; color:white; }
    .modal-header, .modal-footer { border:none; }
    .form-control { background:#374151; color:white; border:none; }
    .form-control:focus { background:#4b5563; color:white; box-shadow:none; }

    @media (max-width:768px){
      .admin-sidebar { width:100%; height:auto; position:relative; }
      .admin-topbar { left:0; }
      .admin-main-content { margin-left:0; }
    }
  </style>
</head>
<body>

<div class="admin-sidebar">
  <div class="admin-sidebar-logo">
  <a class="" href="#">
          🚆 Railway<span class="text-warning">System</span>
        </a>
  </div>
  <a href="index.php">🏠 Dashboard</a>
  <a href="trains.php" class="active">🚆 Trains</a>
  <a href="bookings.php">📋 Bookings</a>

  <div class="admin-sidebar-bottom">
    <a href="/railway_project/index.php" class="btn btn-warning w-100 text-dark fw-bold">⬅ Go to Home</a>
    <a href="logout.php" class="btn btn-danger w-100 fw-bold">🚪 Logout</a>
  </div>
</div>

<div class="admin-topbar">Manage Trains</div>

<div class="admin-main-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4>Trains</h4>
      <button class="btn btn-primary" id="addTrainBtn" data-bs-toggle="modal" data-bs-target="#trainModal">+ Add Train</button>
    </div>

    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Train</th>
            <th>Route</th>
            <th>Class</th>
            <th>Time</th>
            <th>Seats</th>
            <th>Price</th>
            <th>Created</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($trains as $t): ?>
          <tr>
            <td><?= htmlspecialchars($t['id']) ?></td>
            <td>
              <?php if($t['image']): ?>
                <img src="uploads/<?= htmlspecialchars($t['image']) ?>" width="70" height="50" style="object-fit:cover;border-radius:5px;">
              <?php else: ?>No Image<?php endif; ?>
            </td>
            <td><?= htmlspecialchars($t['train_name']) ?></td>
            <td><?= htmlspecialchars($t['route_code'].' - '.$t['route_name']) ?></td>
            <td><?= htmlspecialchars($t['class']) ?></td>
            <td><?= htmlspecialchars($t['depart_time']) ?></td>
            <td><?= htmlspecialchars($t['seats']) ?></td>
            <td><?= number_format($t['price'],2) ?></td>
            <td><?= htmlspecialchars($t['created_at']) ?></td>
            <td>
              <div class="table-action-btns">
                <a href="delete_train.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this train?')">Delete</a>
                <button class="btn btn-sm btn-warning editBtn"
                  data-id="<?= $t['id'] ?>"
                  data-route="<?= $t['route_id'] ?>"
                  data-name="<?= htmlspecialchars($t['train_name']) ?>"
                  data-class="<?= $t['class'] ?>"
                  data-price="<?= $t['price'] ?>"
                  data-time="<?= $t['depart_time'] ?>"
                  data-seats="<?= $t['seats'] ?>"
                  data-image="<?= $t['image'] ?>"
                  data-bs-toggle="modal" data-bs-target="#trainModal">Edit</button>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- ===== MODAL ===== -->
<div class="modal fade" id="trainModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="trainModalTitle">Add Train</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form id="trainForm" action="create_train.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="trainId">
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Select Route</label>
              <select name="route_id" id="routeSelect" class="form-control">
                <option value="">Choose route</option>
                <?php foreach($routes as $r): ?>
                <option value="<?= $r['id'] ?>"><?= htmlspecialchars($r['route_code'].' - '.$r['name']) ?></option>
                <?php endforeach; ?>
              </select>
              <div class="text-danger small train-field-error"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Train Name</label>
              <input type="text" name="train_name" id="trainName" class="form-control">
              <div class="text-danger small train-field-error"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Class</label>
              <select name="class" id="trainClass" class="form-control">
                <option value="">Select Class</option>
                <option value="Business">Business</option>
                <option value="Economy">Economy</option>
                <option value="AC Standard">AC Standard</option>
                <option value="AC Sleeper">AC Sleeper</option>
              </select>
              <div class="text-danger small train-field-error"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Price</label>
              <input type="number" name="price" id="trainPrice" class="form-control" step="1">
              <div class="text-danger small train-field-error"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Train Time</label>
              <input type="time" name="depart_time" id="trainTime" class="form-control">
              <div class="text-danger small train-field-error"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Seats</label>
              <input type="number" name="seats" id="trainSeats" class="form-control">
              <div class="text-danger small train-field-error"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Train Image</label>
              <input type="file" name="image" id="trainImage" class="form-control" accept="image/*">
              <small id="currentImage"></small>
              <div class="text-danger small train-field-error"></div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100" id="trainModalBtn">Create Train</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Prevent back button after logout
if (window.history && window.history.pushState) {
    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function () {
        window.location.href = 'login.php';
    };
}

// Edit modal logic
const editButtons = document.querySelectorAll('.editBtn');
const modalTitle = document.getElementById('trainModalTitle');
const modalBtn = document.getElementById('trainModalBtn');
const trainForm = document.getElementById('trainForm');

editButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    modalTitle.textContent = 'Update Train';
    modalBtn.textContent = 'Update Train';
    trainForm.action = 'update_train.php';

    document.getElementById('trainId').value = btn.dataset.id;
    document.getElementById('routeSelect').value = btn.dataset.route;
    document.getElementById('trainName').value = btn.dataset.name;
    document.getElementById('trainClass').value = btn.dataset.class;
    document.getElementById('trainPrice').value = btn.dataset.price;
    document.getElementById('trainTime').value = btn.dataset.time;
    document.getElementById('trainSeats').value = btn.dataset.seats;
    document.getElementById('currentImage').textContent = btn.dataset.image ? 'Current: ' + btn.dataset.image : 'No image';
  });
});

// Reset modal for Add Train
document.getElementById('addTrainBtn').addEventListener('click', () => {
  modalTitle.textContent = 'Add Train';
  modalBtn.textContent = 'Create Train';
  trainForm.action = 'create_train.php';
  trainForm.reset();
  document.getElementById('currentImage').textContent = '';
});

// Form validation
document.getElementById("trainForm").addEventListener("submit", function(e) {
    let hasError = false;
    document.querySelectorAll(".train-field-error").forEach(el => el.innerText = "");
    document.querySelectorAll("#trainForm .is-invalid").forEach(el => el.classList.remove("is-invalid"));

    const requiredFields = [
        {id: "routeSelect", message: "Route is required"},
        {id: "trainName", message: "Train name is required"},
        {id: "trainClass", message: "Class is required"},
        {id: "trainPrice", message: "Price is required"},
        {id: "trainTime", message: "Departure time is required"},
        {id: "trainSeats", message: "Seats are required"}
    ];

    requiredFields.forEach(f => {
        const field = document.getElementById(f.id);
        const val = field.value.trim();
        const errorEl = field.parentNode.querySelector(".train-field-error");

        if (!val) {
            errorEl.innerText = f.message;
            field.classList.add("is-invalid");
            hasError = true;
        } else {
            errorEl.innerText = "";
            field.classList.remove("is-invalid");
        }
    });

    if (hasError) e.preventDefault();
});
</script>

</body>
</html>
