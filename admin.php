<?php
require_once "Database.php";
require_once "user.php";
abstract class admin {
    private $db;

    public function __construct() {
        $this ->db = new Database();

    }
    public function createuser($full_name, $email,$phone_number,$gender, $DoB, $password) {
        
        $sql = "INSERT INTO admin (full_name, email,phone_number,gender, DoB, password) 
        VALUES ('$full_name', '$email','$phone_number','$gender', '$DoB', '$password')";
        return $this->db->query($sql);
    }
    public function getuserById($user_id) {
        $sql = "SELECT * FROM user WHERE user_id = $user_id";
      
        $result = $this->db->query($sql);

        if ($result && $result->num_rows>0){
            return (mysqli_fetch_assoc ($result));
        }
    }
    public function updateuser($user_id, $full_name, $email,$phone_number,$gender, $DoB, $password) {
        $sql = "UPDATE user SET full_name = '$full_name', email = '$email',phone_number='$phone_number',gender ='$gender', DoB = '$DoB', password = '$password' WHERE user_id = $user_id";
        return $this->db->query($sql);

    }
    public function getAllusers() {
        $sql = "SELECT * FROM user";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteuser($user_id) {
        $sql = "DELETE FROM user WHERE user_id = $user_id";
        return $this->db->query($sql);


      //  $snumber ="ALTER TABLE user AUTO_INCREMENT = 1";



    }



}

?>