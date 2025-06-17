<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Just a placeholder for now
        echo "A password reset link would be sent to your email (not implemented).";
    } else {
        echo "Email not found.";
    }
}
?>

<form method="post" action="">
    <input type="email" name="email" placeholder="Enter your email" required><br>
    <button type="submit">Reset Password</button>
</form>
<link rel="stylesheet" href="style.css">
