<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "users";

$conn = new mysqli($servername, $username, $password, $db);

// if ($conn->connect_error) {
// 	die("Connection failed.");
// } else {
// 	echo "Connected succesfully.";
// }

$newUser = $_POST["username"];
$newEmail = $_POST["email"];
$newPassword = $_POST["password"];
$databaseUser = "SELECT * FROM users WHERE username='$newUser'";
$databaseEmail = "SELECT * FROM users WHERE email='$newEmail'";
$databasePassword = "SELECT * FROM users WHERE password='$newPassword'";
$resU = mysqli_query($conn, $databaseUser);
$resE = mysqli_query($conn, $databaseEmail);
$resP = mysqli_query($conn, $databasePassword);

if (mysqli_num_rows($resU)>0 and mysqli_num_rows($resE)>0 and mysqli_num_rows($resP)>0) {
	// Login success
	echo("Login Successful");
} else {
	// No user found
	header("Location: acc.php");
}


$conn->close();

?>