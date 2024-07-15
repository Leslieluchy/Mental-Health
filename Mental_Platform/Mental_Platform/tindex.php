<?php 
session_start();

if (isset($_SESSION["user_id"])) {

    
    $mysqli = require __DIR__ . "/php/config.php";
    
    $sql = "SELECT * FROM users
            WHERE userID = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>T home</title>
    <style>
        .login-form{
            background-color:bisque;
        }
        section{
            padding: 60px 0;
            background-color:bisque;
        }

    </style> 
</head>
<body>
    
    <h1>Home</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["username"]) ?> you are now logged in.</p>
        
        <p><a href="tlogout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="tlogin.php">Log in</a> or <a href="tregistration.php">sign up</a></p>
        
    <?php endif; ?>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark pt-5 pb-4">
      <div class="container-xxl">
        <!-- navbar brand / title -->
        <a class="navbar-brand" href="#intro">
          <span class="display-5">
            Mental Juu
          </span>
        </a>
        <!-- toggle button for mobile nav -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <!-- navbar links -->
        <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="presignup.html">Sign Up</a>
            </li>
            <!--
            <li class="nav-item">
              <a class="nav-link" href="#contact">Get in Touch</a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="#pricing">Pricing</a>
            </li>
            <li class="nav-item ms-2 d-none d-md-inline">
              <a class="btn btn-secondary" href="#pricing">buy now</a>
            </li>
            -->
          </ul>
        </div>
      </div>
    </nav>
<!--display headings-->    


  <!--Main image & landing page-->
  <section  class="intro">
   <div class="container-lg" id="intro">
      <div class="row d-flex align-items-center justify-content-center">
              <div class="rounded m-1 pt-5 pb-1 ps-2 pe-5 border-top border-start border-primary border-3">
                <p class="display-4">Welcome to Mental JUU, your personal online mental health assistant</p>
              </div>
              <div class="display-6">Book virtual appointments with certified psychologists</div>
              <br><br>
      </div>
    </div>

  </section>


    


    <!--lead text & alignment-->


   <div class="section-lg">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
      <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="3000">
                <img src="assets/motivation1.jpeg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                <h5>Motivational Quotes</h5>
                <p>Browse our infinite library designed to cheer you up</p>
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="assets/motivation2.jpeg" class="d-block w-100" alt="Slide 2">
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="assets/motivation4.jpeg" class="d-block w-100" alt="Slide 3">
              </div>
        </div>
      </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>