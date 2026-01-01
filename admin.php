<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 220px;
            background-color: #1e1e2f;
            color: #fff;
            padding-top: 60px; /* Navbar height */
        }
        .sidebar a {
            display: block;
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #343454;
        }
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" id="nav-trains">🚆 Trains</a>
        <a href="#" id="nav-bookings">📋 Bookings</a>
        <!-- Future Modules -->
        <!-- <a href="#" id="nav-users">👤 Users</a> -->
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <h3>Welcome to Admin Panel</h3>
        <p>Select a module from the sidebar.</p>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar Navigation Logic
    const trainsLink = document.getElementById('nav-trains');
    const bookingsLink = document.getElementById('nav-bookings');
    const mainContent = document.getElementById('main-content');

    trainsLink.addEventListener('click', () => {
        mainContent.innerHTML = `
            <h3>Manage Trains</h3>
            <form id="trainForm">
                <div class="mb-3">
                    <label class="form-label">Train Name</label>
                    <input type="text" class="form-control" placeholder="Enter train name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Route Name</label>
                    <input type="text" class="form-control" placeholder="Enter route name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Class</label>
                    <select class="form-select">
                        <option>Business</option>
                        <option>Economy</option>
                        <option>AC Standard</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Departure Time</label>
                    <input type="time" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Seats</label>
                    <input type="number" class="form-control" placeholder="Total seats">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" placeholder="Price per seat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Train Image</label>
                    <input type="file" class="form-control">
                </div>
                <button class="btn btn-primary">Add Train</button>
            </form>
            <hr>
            <h5>Existing Trains Table</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Route</th>
                        <th>Class</th>
                        <th>Seats</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Existing trains data will go here -->
                </tbody>
            </table>
        `;
    });

    bookingsLink.addEventListener('click', () => {
        mainContent.innerHTML = `
            <h3>Manage Bookings</h3>
            <p>Booking records will appear here.</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Passenger Name</th>
                        <th>Train</th>
                        <th>Class</th>
                        <th>Seats</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Booking records go here -->
                </tbody>
            </table>
        `;
    });
</script>

</body>
</html>
