<?php
session_start();

$error = '';
$host = 'localhost'; // Change if your DB is hosted elsewhere
$dbname = 'koch academy';
$dbuser = 'your_db_username'; // Replace with your DB username
$dbpass = 'your_db_password'; // Replace with your DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Query the users table
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify user exists and password matches
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header('Location: index.html');
        exit();
    } else {
        $error = 'Invalid credentials!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Koch Academy</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 3rem auto;
            background: #fff;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 6px 24px #e3e3e3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4" style="color:#2260b7;">Log In</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button class="btn btn-primary w-100" style="background:#2260b7;">Log In</button>
        </form>
        <div class="mt-3 text-center">
            <a href="register.php" style="color:#2260b7;">Don't have an account? Sign Up</a>
        </div>
    </div>
</body>
</html>

