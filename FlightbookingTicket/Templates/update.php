<?php
require_once '../classes/admin.php';

$Manager = new admin();
$user_id = isset($_GET['id']) ?  $_GET['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $DoB = $_POST['DoB'];
    $password = $_POST['password'];

    $Manager->updateuser($user_id,$full_name, $email,$phone_number,$gender, $DoB, $password);

    header ("location:usermanagement.php");
    exit();
} elseif (isset($_GET['id'])){
    $user_id = $_GET['id'];

    $adminManager = $Manager->getAllusers($user_id);

    if (!$adminManager) {
        header("location:usermanagement.php");
        exit();
    }
} else {
    header("location:usermanagement.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management</title>
  <link rel="stylesheet" href="styles.css">
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
            <h1>Update user</h1>
         <form action="update.php" method="POST">
          <div class="form-group">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="full_name" value="<?php echo $adminManager[0]['full_name'] ?>" required>
             </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $adminManager[0]['email'];?>"> 
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="tel" id="number" name="phone_number" value="<?php echo $adminManager[0]['phone_number']; ?>">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="radio" name="gender" value="Male" <?php echo ($adminManager[0]['gender'] == 'Male') ? 'checked' : ''; ?>>Male
            <input type="radio" name="gender" value="Female" <?php echo ($adminManager[0]['gender'] == 'Female') ? 'checked' : ''; ?>>Female<br><br>
        </div>

        <div class="form-group">
            <label for="DoB">Date of Birth</label>
            <input type="date" id="name" name="DoB" value="<?php echo $adminManager[0]['DoB'];?>">
            </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?php echo $adminManager[0]['password']; ?>" required>
        </div>
        
        <button type="submit" name="submit">Update</button>
    </form>
</div>

    </div>


</body>
</html>
