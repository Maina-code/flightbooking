<?php

require_once '../classes/admin.php';
$userManager = new admin();
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $result = $userManager->deleteuser($user_id);
    
    if ($result) {
        echo "User deleted successfully.";
    } else {
        echo "Failed to delete user.";
    }
} else {
    echo "User ID not provided.";
}

header("location: usermanagement.php");


?>
