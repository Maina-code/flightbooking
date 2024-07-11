<?php 
require_once '../config/db_config.php';
require_once 'Database.php';
class Admin {
	private $db;
	public function _construct(){
		$this->db = new Database;

	}

	public function createAdmin($full_name, $password) {
        
        $sql = "INSERT INTO admin (full_name, password) VALUES ('$full_name', '$password')";
        return $this->db->query($sql);
    }

    public function getAdminById($admin_id) {
        
        $sql = "SELECT * FROM admin WHERE id = $admin_id";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function updateAdmin($admin_id, $newfull_name, $newPassword) {
        
        $sql = "UPDATE admin SET username = '$newfull_name', password = '$newPassword' WHERE id = $admin_id";
        return $this->db->query($sql);
    }

    public function getAllAdmins() {
   
    $sql = "SELECT * FROM admin";
    return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
}


    public function deleteAdmin($admin_id) {
     
        $sql = "DELETE FROM admin WHERE id = $admin_id";
        return $this->db->query($sql);
    }
}
?>

