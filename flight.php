<?php 
require_once 'Database.php';
class flight {
    private $db;

    public function __construct() {
        $this->db = new Database();

    }
    public function getFlight($airline_name, $departure_city, $arrival_time,$departure_time,$arrival_city){
        $sql = "INSERT INTO flight (airline_name, departure_city, arrival_city, departure_time, arrival_time)
        VALUES ('$airline_name', '$departure_city', '$arrival_city', '$departure_time', '$arrival_time')";
        return $this->db ->query($sql);
        // $result= $this->db->query($sql);
        // if ($result&&$result->num_rows >0) {
        //     return true;
        //     //echo "welcome";
        // }
        // else{
        //     return false;
        // }

    }

    public function getflightById($flight_id){
        $sql = "SELECT * FROM flight WHERE id = $flight_id ";
        //return $this->db->query($sql);

        $results =$this->db->query($sql);
        if ($results && $results->num_rows>0) {
            return mysqli_fetch_assoc($results);

        }

    }

    public function updateflight($flight_id, $airline_name,$departure_city,$arrival_city,$departure_time,$arrival_time){
        $sql= "UPDATE flight SET airline_name = '$airline_name',departure_city='$departure_city', arrival_city='$arrival_city', departure_time='$departure_time', arrival_time='$arrival_time' 
        WHERE  flight_id = $flight_id ";
        return $this->db->query($sql);
    }

    public function deleteflight($flight_id){
        $sql="DELETE FROM flight WHERE flight_id= $flight_id";
        return $this->db->query($sql);

    }

    public function getAllflight() {
        $sql = "SELECT * FROM flight";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }




}
?>