<?php
$conn = new mysqli("localhost", "root", "", "mydatabase");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    
        header("Location: sumanth.html");
        exit();
    } else {
        echo "<h3 style='color:red;'>❌ Invalid credentials. <a href='login.html'>Try again</a></h3>";
    }
}

$conn->close();
?>