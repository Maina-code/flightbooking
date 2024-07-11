<?php
require_once 'Database.php';

 class user {
	protected $db;

	public function __construct (){
		$this ->db = new Database();

	}

	public function getuser($full_name, $email,$phone_number,$gender, $DoB, $password){
		$sql = "INSERT INTO user (full_name, email, phone_number, gender, DoB, password)
		VALUES ('$full_name','$email','$phone_number','$gender','$DoB','$password')";
		// return $this ->db -> query($sql);

		$result = $this ->db ->query($sql);
		if ($result&&$result->num_rows >0) {
			return true;
			//echo "welcome";
		}
		else{
			return false;
		}

	}
 
}
class login extends user {
	public function __construct(){
		parent::__construct();
	}
	
		
	public function authenticate($full_name, $password){
		$sql = "SELECT * FROM user WHERE full_name= '$full_name' AND password = '$password'";
		$result = $this->db ->query ($sql);

		return ($result && $result->num_rows > 0);	
		
		//var_dump($sql);	

	} 
}

?>