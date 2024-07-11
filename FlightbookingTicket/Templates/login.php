<?php

session_start();
if (isset($_POST['submit'])){
    $_SESSION['full_name']= $_POST['full_name'];
   
    

   // header('location:index.php');
    

}
?>
<DOCTYPE html>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>login</title>
		<style>
			body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    color: #555;
}

input {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

		</style>
	</head>
	<body>
		<div class="login-container">
    <h2>Login</h2>
    <form action="#" method="POST">
        <label for="username">Full Name:</label>
        <input type="text" id="username" name="full_name" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name= "submit" value="Login">
    </form>
	
	</body>
	</html>


<?php
require_once '../classes/user.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$full_name = $_POST ['full_name'];
	$password = $_POST['password'];

	$loginmananger = new login();
	
	

	if (empty($full_name) || empty($password)) {
		echo "please enter your full name and password";
	} else {


		if ($loginmananger->authenticate($full_name, $password)) {
			echo "redirecting to the home page...";
			header ("location: index.php");
		} else {
			echo "username not found please check your credentials!";
		}

    }
}


?>
