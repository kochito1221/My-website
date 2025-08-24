<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koch Academy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="login_style.css">
    
</head>
<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>Koch Academy</h1>
        <h3>Pharm Tutor Academy</h3>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Koch Academy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
            <li class="nav-item"><a class="nav-link" href="#">DESIGN</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Tutor Academy
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Pharmacotherapy One</a></li>
                <li><a class="dropdown-item" href="#">Pharmacotherapy Two</a></li>
                <li><a class="dropdown-item" href="#">Pharmacotherapy Three</a></li>
                <li><a class="dropdown-item" href="#">Pharmacotherapy Four</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">CONTACT</a></li>
            <li class="nav-item"><a class="nav-link" href="#">ABOUT US</a></li>
          </ul>
          <ul class="navbar-nav mb-2 mb-lg-0">
            <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-item"><span class="nav-link">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">LOG OUT</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">LOG IN</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php">SIGN UP</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="hero d-flex align-items-center justify-content-center text-white">
        <h2>Empower Your Future in Pharmacotherapy</h2>
    </div>

    <div class="cont text-center py-4">
        <h1>Learn <br> <span>Pharmacotherapy</span></h1>
        <p class="para">Koch Academy's Pharmacotherapy program offers comprehensive training in medication management and therapeutic strategies.</p>
        <a href="#" class="btn btn-primary">Start Now</a>
    </div>

    <div class="gallery container">
        <div class="row">
            <div class="col-md-3 col-6 mb-3"><img src="img/koch.jpg" class="img-fluid rounded" alt="Image 1"></div>
            <div class="col-md-3 col-6 mb-3"><img src="img/34.jpg" class="img-fluid rounded" alt="Image 2"></div>
            <div class="col-md-3 col-6 mb-3"><img src="img/40.jpg" class="img-fluid rounded" alt="Image 3"></div>
            <div class="col-md-3 col-6 mb-3"><img src="img/b.jpg" class="img-fluid rounded" alt="Image 4"></div>
        </div>
    </div>

    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; 2025 Koch Academy. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>