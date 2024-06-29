<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Mental Juu</title>
</head>
<body>
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
                <a class="nav-link" href="index.html">HOME</a>
              </li>
            </ul>
        </div>
      </div>
    </nav>

<h1 class="rounded display-4 text-center text-white bg-primary m-1 ps-3 pt-5 pe-5 pb-5">Log In</h1>
<div class="container-fluid my-1 mx-1 p-5 text-center bg-secondary" id="login-container">
<form class="rounded m-1 p-2" id="form1" method="post">
    <label for="username" class="lead">Username:</label>
    <input type="text" id="username" name="username" placeholder="Username" minlength="8"><br><br>
    <label for="password" class="lead">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter password..." required><br><br>
    <button type="submit" form="form1" value="register" class="rounded-pill btn btn-success">Log In</button>
    <button type="reset" form="form1" class="rounded-pill btn btn-secondary">Reset Form</button>

</form>
</div><!--container div-->



</body>






</html>