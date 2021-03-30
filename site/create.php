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
$newPasswordOne = $_POST["password1"];
$newPasswordTwo = $_POST["password2"];
$databaseUser = "SELECT * FROM users WHERE username='$newUser'";
$databaseEmail = "SELECT * FROM users WHERE email='$newEmail'";
$resU = mysqli_query($conn, $databaseUser);
$resE = mysqli_query($conn, $databaseEmail);

if ($newPasswordOne == $newPasswordTwo) {
	if (mysqli_num_rows($resU)>0 and mysqli_num_rows($resE)>0) {
		// Exsisting user and/or email
		header('Location: acc.php');
	} else {
		$sql = "INSERT INTO users (username, email, password) VALUES ('$newUser', '$newEmail', '$newPasswordOne')";
		if (mysqli_query($conn, $sql) === True) {
			// Successfull Creation
			header('Location: log.php');
		} else {
			// Went wrong
			header('Location: acc.php');
		}
	}
}

$conn->close();

?>