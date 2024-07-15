<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title id="ffg">T registration</title>

    <style>
        .signup-form{
          background-color:bisque;
        }
        body { padding-top: 70px; }
    </style> 

<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark pt-2 pb-2">
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
</head>
<body>
   


<section class="signup-form">
<h1 class="rounded display-2 text-center text-white bg-primary ps-3 pt-5 pe-5 pb-5">Sign Up</h1>


<center>
<section class="shadow-lg login-section rounded p-3 m-1 justify-content-center align-items-center bg-secondary ">

<div class="container-lg my-2 mx-1 pt-4 text-start">
<form class="row g-3 form-floating" action="tprocess-registration.php" method="POST" enctype="multipart/form-data" id="form1">



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
    <!--<div class="mb-3">
      <label for="profilephoto" class="form-label">Add a profile photo</label>
      <input class="form-control" type="file" id="profilephoto" name="profilephoto">
    </div>  -->
    <br>

    <div>
    <input type="checkbox" id="termsandconditions" name="termsandconditions" required>
    <label for="termsandconditions">Read the <a href="" class="bg-danger">Terms & conditions</a> here</label>
  </div>


  <div class="justify-content-center">
    <button type="submit" form="form1" name="submit" class="rounded-pill btn btn-success">Sign up</button>
    <button type="reset" form="form1" class="rounded-pill btn btn-secondary">Reset Form</button>
  </div>

</form>
</div>
</section>
</center>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>







</html>