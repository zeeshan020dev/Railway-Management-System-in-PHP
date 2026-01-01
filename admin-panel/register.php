<?php
session_start();
require '../connect.php';

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';
    $role     = $_POST['role'] ?? 'user';

    if(!$username || !$email || !$password || !$confirm) $errors[] = "All fields are required.";
    if($password !== $confirm) $errors[] = "Passwords do not match.";

    $check = $pdo->prepare("SELECT id FROM users WHERE email=?");
    $check->execute([$email]);
    if($check->rowCount() > 0) $errors[] = "Email already exists.";

    if(empty($errors)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username,email,password,role) VALUES (?,?,?,?)");
        $stmt->execute([$username,$email,$hash,$role]);

        $_SESSION['success_msg'] = "Account created successfully. Please login.";
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #1f2937; color: #fff; }
label { color: #fff; font-weight:600; }
.card { background:#111827; border-radius:15px; }
input, select {
    background:#1f2937 !important;
    color:#fff !important;
    border:none;
    border-bottom:2px solid #facc15;
}
</style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
  <div class="card p-4 col-md-6">
    <h2 class="text-warning text-center mb-4">Create Account</h2>

    <?php if($errors): ?>
      <div class="alert alert-danger">
        <?php foreach($errors as $e) echo "<div>$e</div>"; ?>
      </div>
    <?php endif; ?>

    <?php if($success): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <form method="post" id="registerForm">
      <label>Username</label>
      <input type="text" name="username" id="username" class="form-control mb-3" required>

      <label>Email</label>
      <input type="email" name="email" id="email" class="form-control mb-3" required>

      <label>Password</label>
      <input type="password" name="password" id="password" class="form-control mb-3" required>

      <label>Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm_password" class="form-control mb-3" required>

      <label>Register as</label>
      <select name="role" class="form-control mb-4">
          <option value="user">User</option>
          <option value="admin">Admin</option>
      </select>

      <button type="submit" class="btn btn-warning w-100">Register</button>
      <p class="mt-3 text-center">
Already registered? <a href="login.php">Login</a>
</p>
    </form>

  </div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', function(e){
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirm = document.getElementById('confirm_password').value.trim();

    if(!username || !email || !password || !confirm){
        e.preventDefault();
        alert('All fields are required.');
        return false;
    }

    // Simple email format validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailPattern.test(email)){
        e.preventDefault();
        alert('Please enter a valid email address.');
        return false;
    }

    if(password.length < 6){
        e.preventDefault();
        alert('Password must be at least 6 characters.');
        return false;
    }

    if(password !== confirm){
        e.preventDefault();
        alert('Passwords do not match.');
        return false;
    }
});
</script>

</body>
</html>
