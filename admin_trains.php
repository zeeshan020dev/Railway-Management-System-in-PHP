<?php
require 'connect.php';

// fetch routes for dropdown
$routes = $pdo->query("SELECT id, route_code, name FROM routes ORDER BY id")->fetchAll();

// fetch trains to display
$trains = $pdo->query("
  SELECT t.*, r.route_code, r.name AS route_name 
  FROM trains t
  JOIN routes r ON t.route_id = r.id
  ORDER BY t.created_at DESC
")->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin - Trains</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h3 class="mb-4">Trains (Admin)</h3>

  <!-- Add train form -->
  <div class="card mb-4">
    <div class="card-body">
      <h5 class="card-title">Add Train</h5>

      <form action="create_train.php" method="post" enctype="multipart/form-data" class="row g-3">

        <!-- Route Dropdown -->
        <div class="col-md-6">
          <label class="form-label">Select Route</label>
          <select name="route_id" class="form-control" required>
            <option value="">Choose route</option>
            <?php foreach($routes as $r): ?>
              <option value="<?= $r['id'] ?>">
                <?= htmlspecialchars($r['route_code'] . " - " . $r['name']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Train name -->
        <div class="col-md-6">
          <label class="form-label">Train Name</label>
          <input type="text" name="train_name" class="form-control" required>
        </div>

        <!-- Class -->
        <div class="col-md-6">
          <label class="form-label">Class</label>
          <select name="class" class="form-control" required>
            <option value="Business">Business</option>
            <option value="Economy">Economy</option>
            <option value="AC Standard">AC Standard</option>
            <option value="AC Sleeper">AC Sleeper</option>
          </select>
        </div>

        <!-- Price -->
        <div class="col-md-6">
          <label class="form-label">Price</label>
          <input type="number" name="price" class="form-control" required step="1">
        </div>

        <!-- Time -->
        <div class="col-md-6">
          <label class="form-label">Train Time</label>
          <input type="time" name="depart_time" class="form-control" required>
        </div>

        <!-- Seats -->
        <div class="col-md-6">
          <label class="form-label">Seats</label>
          <input type="number" name="seats" class="form-control" required>
        </div>

        <!-- Image -->
        <div class="col-md-6">
          <label class="form-label">Train Image</label>
          <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <!-- Submit -->
        <div class="col-12">
          <button type="submit" class="btn btn-primary w-100">Create Train</button>
        </div>

      </form>

    </div>
  </div>

  <!-- Trains table -->
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Route</th>
        <th>Train</th>
        <th>Class</th>
        <th>Price</th>
        <th>Time</th>
        <th>Seats</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($trains as $t): ?>
      <tr>
        <td><?= $t['id'] ?></td>
        
        <!-- image display -->
        <td>
          <?php if ($t['image']): ?>
            <img src="uploads/<?= htmlspecialchars($t['image']) ?>" width="70" height="50" style="object-fit:cover;border-radius:5px;">
          <?php else: ?>
            No Image
          <?php endif; ?>
        </td>

        <td><?= htmlspecialchars($t['route_name']) ?></td>
        <td><?= htmlspecialchars($t['train_name']) ?></td>
        <td><?= htmlspecialchars($t['class']) ?></td>
        <td><?= number_format($t['price'], 0) ?></td>
        <td><?= htmlspecialchars($t['depart_time']) ?></td>
        <td><?= htmlspecialchars($t['seats']) ?></td>
        <td><?= htmlspecialchars($t['created_at']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
</body>
</html>
