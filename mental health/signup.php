<?php
include 'dbconnect.php'; // Ensure this file correctly sets up the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Validate passwords
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the database
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashedPassword', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect to a success page or login page
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method.";
}
?>

