<!--?php

include("php/config.php");

$usernameError = "";
$passwordError = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $usernameError = "Username is required";
    } else {
        $username = trim($username);
        $username = htmlspecialchars($username);
        if (!preg_match("/^[a-zA-Z]*$/", $username)) {
            $usernameError = "Username should only contain letters and spaces";
        }
    }
    if (empty($password)) {
        $passwordError = "Password is required";
    } else{
        if(strlen($password) <=8){
            $passwordError = "Password should be atleast 8 characters long";
        }elseif(!preg_match("#[0-9]+#", $password)){
            $passwordError = "Atleast one digit";
        }elseif(!preg_match("#[a-z]+#", $password)){
            $passwordError = "Atleast one small letter";
        }elseif(!preg_match("#[A-Z]+#", $password)){
            $passwordError = "Atleast one capital letter";
        }
    }
}

?-->

<?php 
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/php/config.php";

    // Check if the connection was successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        die("Failed to prepare statement: " . $mysqli->error);
    }

    // Bind the username parameter
    $stmt->bind_param("s", $_POST["username"]);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Failed to execute statement: " . $stmt->error);
    }

    // Get the result
    $result = $stmt->get_result();
    if (!$result) {
        die("Failed to get result: " . $stmt->error);
    }

    $user = $result->fetch_assoc();

    if($user){
      if(password_verify($_POST["password"], $user["password_hash"])){

        session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["userID"];
            
            header("Location: tindex.php");
            exit;
      }
    }

    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>T log in</title>
    <style>
        .login-form{
            background-color:bisque;
        }
    </style> 
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark pt-5 pb-4">
        <div class="container-xxl">
            <!-- navbar brand / title -->
            <a class="navbar-brand" href="#intro">
                <span class="display-5">Mental Juu</span>
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

    <section class="login-form">
        <h1 class="rounded display-4 text-center text-white bg-primary ps-3 pt-5 pe-5 pb-5">Log In</h1>
        <center>
            <section class="shadow-lg login-section rounded p-3 m-1 justify-content-center align-items-center bg-secondary ">
                <div class="container-fluid my-1 mx-1 p-5 text-center" id="login-container">
                <?php if ($is_invalid): ?>
                <em>Invalid login</em>
                <?php endif; ?>
                    <form class="rounded m-1 p-2 form-floating" id="form1" method="post">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <div class="form-floating mb-1">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Any nickname" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-1">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <button type="submit" form="form1" name="submit" class="rounded-pill btn btn-success">Log In</button>
                            <button type="reset" form="form1" class="rounded-pill btn btn-secondary">Reset Form</button>
                        </div>
                    </form>
                </div><!--container div-->
            </section>
        </center>
    </section>
</body>
</html>
