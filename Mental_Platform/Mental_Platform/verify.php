<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    
    // Update user status to verified
    $sql = "UPDATE users SET verified = 1 WHERE MD5(email) = '$code'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Email verified successfully.";
    } else {
        echo "Error verifying email: " . $conn->error;
    }
}
?>