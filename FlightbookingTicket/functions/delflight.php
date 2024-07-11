<?php
require_once '../classes/flight.php';

$flightManager = new flight();
if (isset($_GET['id'])){
    $flight_id = $_GET['id'];

    $flight= $flightManager->deleteflight($flight_id);

    if ($flight) {
        echo "flight deleted succefully.";

    } else {
        echo "flight not deleted.";
    }
} else {
    echo "flight ID not provided!";
}
header ("location:../Templates/flightmanagement.php");

?>