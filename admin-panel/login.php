<?php
session_start();
require '../connect.php';

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if(!$email || !$password) $errors[] = "All fields are required.";

    if(!$errors){
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] === 'admin'){
                header("Location: index.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit;
        } else {
            $errors[] = "Invalid login credentials.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#1f2937;color:#fff;}
label{color:#fff;font-weight:600;}
.card{background:#111827;border-radius:15px;}
input{
 background:#1f2937 !important;
 color:#fff !important;
 border:none;
 border-bottom:2px solid #facc15;
}
</style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
<div class="card p-4 col-md-4">

<h3 class="text-warning text-center mb-3">Login</h3>

<?php if($errors): ?>
<div class="alert alert-danger">
<?php foreach($errors as $e) echo "<div>$e</div>"; ?>
</div>
<?php endif; ?>

<form method="post" id="loginForm">
<label>Email</label>
<input type="email" name="email" id="email" class="form-control mb-3" required>

<label>Password</label>
<input type="password" name="password" id="password" class="form-control mb-4" required>

<button type="submit" class="btn btn-warning w-100">Login</button>
<p class="mt-4 text-center">
Don't have an account? <a href="register.php">Register Here</a>
</p>

</form>
</div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e){
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    
    if(!email || !password){
        e.preventDefault(); // prevent form submission
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

    // Password length check
    if(password.length < 6){
        e.preventDefault();
        alert('Password must be at least 6 characters.');
        return false;
    }
});
</script>

</body>
</html>
