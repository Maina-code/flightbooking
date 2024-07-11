<?php 
session_start();
if (isset($_POST['submit'])){
    $_SESSION['full_name']= $_POST['full_name'];

    header('location:index.php');

}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f8f8;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            font-weight: bold;
            color: #555;
        }
        
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }
        
    </style>

 </head>
 <body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="#" method = "POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="full_name"placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"placeholder="Enter your email address" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="tel" id="number" name="phone_number"placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" required>Male
                <input type="radio" name="gender"required>Female<br><br>
            </div>
            <div class="form-group">
                <label for="DoB">Date of Birth</label>
                <input type="date" id="name" name="DoB"placeholder="Enter your date of birth" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="submit">Submit</button>
            <p>Do you have an account? <a href="login.php">log in</p>
        </form>
    </div>
</body>
</html>

<?php
require_once '../classes/user.php';
$userManager = new user();

if (isset($_POST['submit'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $DoB = $_POST['DoB'];
    $password = $_POST['password'];

    $results = $userManager->getuser($full_name,$email,$phone_number,$gender,$DoB,$password);
  if($results){
    header("location:index.php");
    //echo "welcome";
  }else{
    echo "failed to sign up";
  }
}



?>