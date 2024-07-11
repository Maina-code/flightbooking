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
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    a {
      text-decoration: none;
      color: #007BFF;
    }
  </style>
</head>
<body>

  <h2>User Management - Admin Panel</h2>

  <?php
   // require_once "../config/db_config.php";
    require_once "../classes/admin.php";
   // require_once "../classes/Database.php";
    $userManager = new admin();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['newfull_name']) && isset($_POST['newemail']) && isset ($_POST['newphone_number'])
   && isset($_POST['newgender']) && isset($_POST['newDoB']) && isset($_POST['newpassword'])) {
        $full_name = $_POST['newfull_name'];
        $email = $_POST['newemail'];
        $phone_number = $_POST['newphone_number'];
        $gender =$_POST['newgender'];
        $DoB =$_POST['newDoB'];
        $password = $_POST['newpassword'];
    }
}
  
  $adminrecords = $userManager->getAllusers();
  $resultSet = $userManager->getAllusers();


  if ($resultSet) {
    echo "<table>";
    echo "<tr><th>User ID</th><th>full name</th><th>Email</th><th>phone number </th>
    <th>gender</th><th>Date of birth</th><th>Password</th><th>Action</th></tr>";

  foreach ($adminrecords as $user) {
      echo "<tr>";
      echo "<td>" . $user["user_id"] . "</td>";
      echo "<td>" . $user["full_name"] . "</td>";
      echo "<td>" . $user["email"] . "</td>";
      echo "<td>" . $user["phone_number"] . "</td>";
      echo "<td>" . (($user['gender'] == 'Male') ? 'Male' : 'Female') . "</td>";
      echo "<td>" . $user["DoB"] . "</td>";
      echo "<td>" . $user["password"] . "</td>";
      echo "<td><a href='update.php?id=" . $user["user_id"] . "'>Update</a> | <a href='delete.php?id=" . $user["user_id"] . "'>Delete</a></td>";
      echo "</tr>";
  }


    echo "</table>";
  } else {
    echo "No users found.";
  }

  //$resultSet->exit();
  ?>
</body>
</html>
