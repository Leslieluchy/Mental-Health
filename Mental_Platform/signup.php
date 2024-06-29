<?php
include("php/config.php"); // Ensure this file includes database connection setup

$errors = [];

if (isset($_POST['submit'])) { // Check if the form is submitted
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $DOB = $_POST['DOB'];
    $timezone = $_POST['timezone'];
    $primarylanguage = $_POST['primary_language'];
    $secondarylanguage = isset($_POST['secondarylanguage']) ? $_POST['secondarylanguage'] : null; // Corrected name attribute
    $gender = $_POST['gender'];
    /*
    $profilephoto = $_FILES['profilephoto'];

             // Add code to handle file upload
              $profile_photo_name = $profilephoto['name']; // Filename
              $profile_photo_tmp = $profilephoto['tmp_name']; // Temporary file path
              $profile_photo_type = $profilephoto['type']; // File type

              // Move uploaded file to desired location (e.g., server's directory)
              $upload_dir = "uploads/"; // Example directory
              $target_file = $upload_dir . basename($profile_photo_name);

              if (move_uploaded_file($profile_photo_tmp, $target_file)) {
                  // File uploaded successfully, continue with database insertion
              } else {
                  // File upload failed, handle error (you may want to redirect back with an error message)
              }

         */     

    // $profile_photo = $_FILES['profilephoto']; // Correct handling for file upload

    // Validate username
    if (empty($username)) {
        $errors['u'] = "<span style='color: red;'>Username is required!</span>";
    } else {
        $query_username = "SELECT username FROM users WHERE username = ?";
        $stmt_username = mysqli_prepare($con, $query_username);
        mysqli_stmt_bind_param($stmt_username, "s", $username);
        mysqli_stmt_execute($stmt_username);
        mysqli_stmt_store_result($stmt_username);

        if (mysqli_stmt_num_rows($stmt_username) > 0) {
            $errors['u'] = "<span style='color: red;'>Username already exists!</span>";
        }

        mysqli_stmt_close($stmt_username);
    }

    // Validate email
    if (empty($email)) {
        $errors['e'] = "<span style='color: red;'>Email is required!</span>";
    } else {
        $query_email = "SELECT email FROM users WHERE email = ?";
        $stmt_email = mysqli_prepare($con, $query_email);
        mysqli_stmt_bind_param($stmt_email, "s", $email);
        mysqli_stmt_execute($stmt_email);
        mysqli_stmt_store_result($stmt_email);

        if (mysqli_stmt_num_rows($stmt_email) > 0) {
            $errors['e'] = "<span style='color: red;'>Email already registered!</span>";
        }

        mysqli_stmt_close($stmt_email);
    }

    // If no validation errors, insert into database
    $stmt_insert = mysqli_prepare($con, "INSERT INTO users (firstname, lastname, username, password, email, date_of_birth, Timezone, primary_language, secondary_language, gender, profilephoto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt_insert, "sssssssssss", $firstname, $lastname, $username, $password, $email, $DOB, $timezone, $primarylanguage, $secondarylanguage, $gender, $target_file);
    
    if (mysqli_stmt_execute($stmt_insert)) {
      session_start();
      $_SESSION['registration_message'] = 'Registration successful!';
      header("Location: login.php");
      exit;
  } else {
      echo "<div class='message'>
              <p class='error'>Error occurred during registration: " . mysqli_error($con) . "</p>
            </div><br>";
  }
  
    mysqli_stmt_close($stmt_insert);
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title id="ffg">Mental Juu</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark pt-2 pb-2">
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
                <a class="nav-link" href="index.html">HOME</a>
              </li>
            </ul>
        </div>
      </div>
    </nav>


<h1 class="rounded display-2 text-center text-white bg-primary m-1 ps-3 pt-5 pe-5 pb-5">Sign Up</h1>

<center>
<section class="login-section rounded p-3 m-1 justify-content-center align-items-center bg-secondary">

<div class="container-lg my-2 mx-1 pt-4 text-start">
<form class="row g-3 form-floating" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" id="form1">



  <div class="row g-2">
      <div class="col-md-6">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="n" required>
          <label for="firstname">First Name</label>
        </div>  
      </div>

      <div class="col-md-6">
        <div class="form-floating mb-1">
          <input type="text" class="form-control"id="lastname" name="lastname" placeholder="Last Name" required>
          <label for="lastname">Last name</label>
        </div>  
      </div>

      <div class="col-md-6">
          <div class="form-floating mb-1">
              <input type="text" class="form-control"id="username" name="username" placeholder="Any nickname" required>
              <label for="username">Username</label>
          </div>
      </div>

  <div class="col-md-6">
    <div class="form-floating mb-1">
      <input type="password" class="form-control"id="password" name="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    
  </div>

  <div class="col-md-6">
        <div class="form-floating mb-1">
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
          <label for="email">Email</label>
        </div>
  </div>

  <div class="col-md-6">
        <div class="form-floating mb-1">
          <input type="date" class="form-control" id="DOB" name="DOB" placeholder="Date of Birth" required>
          <label for="DOB">Date of Birth</label>
        </div>
  </div>

  <div class="col-12">
  <div class="form-floating mb-1">
          <input type="text" class="form-control" id="timezone" name="timezone" placeholder="timezone" required>
          <label for="timezone">Current timezone</label>
        </div>
  </div>

  <div class="col-md"> 

    <div class="form-floating mb-1">
      <select class="form-select" id="primamrylanguage" name="primarylanguage" aria-label="Floating label select example">
          <option selected>Open this select menu</option>
          <option value="English">English</option>
          <option value="Swahili">Swahili</option>
          <option value="French">French</option>
      </select>
      <label for="primamrylanguage">Primary language</label>
  </div>
  <br>

  <div class="col-md">
    <div class="form-floating mb-1">
    <input type="text" class="form-control" id="secondarylanguage" name="secondarylanguage" placeholder="Optional" required>
    <label for="timezone">Second Language</label>
  
    </div>
  </div>
    <div>
    <label for="gender" class="lead text-center">Gender</label>
    </div>

    <div class="form-check form-check-inline col-md-5">
        <label class="form-check-label" for="inlineCheckbox1">Male</label>
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="gender" value="male">
      </div>

    <div class="form-check form-check-inline col-md-5">
        <label class="form-check-label" for="inlineCheckbox1">Female</label>
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="gender" value="female">

    </div>
   

    <br><br>
    <div class="mb-3">
      <label for="profilephoto" class="form-label">Add a profile photo</label>
      <input class="form-control" type="file" id="profilephoto" name="profilephoto" accept="image/jpeg, image/png,">
    </div>
  
    <br>

    <div>
    <input type="checkbox" id="termsandconditions" name="termsandconditions">
    <label for="termsandconditions">Read the <a href="" class="bg-danger">Terms & conditions</a> here</label>
  </div>


  <div class="justify-content-center">
    <button type="submit" form="form1" value="register" class="rounded-pill btn btn-success">Sign up</button>
    <button type="reset" form="form1" class="rounded-pill btn btn-secondary">Reset Form</button>
  </div>

</form>
</div>
</section>
</center>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>







</html>