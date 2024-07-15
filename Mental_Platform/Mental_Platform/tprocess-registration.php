<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = [];

// Include the database connection file
$mysqli = require __DIR__ . "/php/config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check for required fields and validate input
    if (empty($_POST["firstname"])) {
        die("First name is required");
    }
    if (empty($_POST["lastname"])) {
        die("Last name is required");
    }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Valid email is required");
        /*if (mysqli_stmt_num_rows($stmt_email) > 0) {
            $errors['e'] = "<p style='color: red;'>Email already registered!</p>";
        }

        mysqli_stmt_close($stmt_email);*/
    }

    // Password validation
    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }
    if (!preg_match("/[0-9]/", $_POST["password"])) {
        die("Password must contain at least one number");
    }
    if (!preg_match("/[a-z]/", $_POST["password"])) {
        die("Password must contain at least one lowercase letter");
    }
    if (!preg_match("/[A-Z]/", $_POST["password"])) {
        die("Password must contain at least one uppercase letter");
    }
    /*
    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        die("Passwords must match");
    }
    */

    // Hash the password
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Sanitize input data
    $firstname = htmlspecialchars(trim($_POST["firstname"]));
    $lastname = htmlspecialchars(trim($_POST["lastname"]));
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $DOB = htmlspecialchars(trim($_POST["DOB"]));
    $timezone = htmlspecialchars(trim($_POST["timezone"]));
    $primarylanguage = htmlspecialchars(trim($_POST["primarylanguage"]));
    $secondarylanguage = htmlspecialchars(trim($_POST["secondarylanguage"]));
    /*$gender = htmlspecialchars(trim($_POST["gender"]));*/
    

    // Prepare an SQL statement to insert data into the database
    $sql = "INSERT INTO users (firstname, lastname, username, email, DOB, timezone, primarylanguage, secondarylanguage /*, gender*/, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?, ?, /*?,*/ ?)";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sssssssss", $firstname, $lastname, $username, $email, $DOB, $timezone, $primarylanguage, $secondarylanguage, /*$gender,*/ $password_hash);

    if ($stmt->execute()) {
        $_SESSION['registration_message'] = "Registration successful!";
        header("location:tlogin.php");
        exit;
    } else {
        if ($mysqli->errno === 1062) {
            die("Email already taken");
        } else {
            die($mysqli->error . " " . $mysqli->errno);
            /*echo "Error: " . $stmt->error;*/
        }
    }
     

    $stmt->close();
    $mysqli->close();
}
?>
