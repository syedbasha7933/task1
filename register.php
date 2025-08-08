<?php
$conn = new mysqli("localhost", "root", "", "mydatabase");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $check = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "<h3 style='color:red;'>❌ Username already exists. <a href='register.html'>Try again</a></h3>";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        if ($conn->query($sql) === TRUE) {
            echo "<h3 style='color:green;'>✅ Registered successfully! <a href='login.html'>Login Now</a></h3>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
$conn->close();
?>