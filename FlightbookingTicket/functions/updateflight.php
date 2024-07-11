<?php 
require_once '../classes/flight.php';
$flight = new flight();
$flight_id = isset($_GET['id']) ? $_GET['id'] : null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    $flight_id = $_POST ['flight_id'];
    $airline_name = $_POST['airline_name'];
    $departure_city = $_POST ['departure_city'];
    $arrival_city = $_POST ['arrival_city'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];

    $flight->updateflight($flight_id ,$airline_name, $departure_city, $arrival_city, $departure_time, $arrival_time);

    header ("location:../Templates/flightmanagement.php");
    exit();
} elseif (isset($_GET['id'])) {
    $flight_id = $_GET['id'];

    $flightMananger = $flight->getAllflight();

    if (!$flightMananger){
       header("location:../Templates/flightmanagement.php");
         exit();
    }
   

}else {
   header("location: ../Templates/flightmanagement.php");
     exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>updating flight</title>
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
        h1 {
            text-align: center;
            color: #333;
        }

		    
    </style>
</head>
<body>
<div>
	<h1> Update Flight</h1>
	<form action="#" method="POST">
        <div>
            <input type = "hidden" name ="flight_id" value = "<?php echo $flight_id; ?>">
        </div>
    <div>
        <label for="flight_name">Airline Name:</label>
        <input type="text" id="airline_name" name="airline_name" value ="<?php echo $flightMananger[0]['airline_name']; ?>">
    </div>
    <div>
        <label for="departure_city">Departure City:</label>
        <input type="text" id="departure_city" name="departure_city" value ="<?php echo $flightMananger[0]['departure_city']; ?>">
    </div>
    <div>
        <label for="arrival_city">Arrival City:</label>
        <input type="text" id="arrival_city" name="arrival_city" value ="<?php echo $flightMananger[0]['arrival_city']; ?>">
    </div>
    <div>
        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" value ="<?php echo $flightMananger[0]['departure_time']; ?>">
    </div>
    <div>
        <label for="arrival_time">Arrival Time:</label>
        <input type="datetime-local" id="arrival_time" name="arrival_time" value ="<?php echo $flightMananger[0]['arrival_time']; ?>">
    </div>
    <div>
        <button type="submit" name= "submit">Update Flight</button>
    </div>
</form>
</div>
</body>
</html>