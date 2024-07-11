<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>flight Management</title>
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
    button {
      background-color: blue;
      border-radius: 2px;
      display: block;
      border: none;
      font-size:16px;
    }
    button a {
      color: white;
    }
  </style>
</head>
<body>

<div>
  <h2>Flights Management</h2>
</div>
<div>
  <button><a href ="flights.php" > Add flight</a></button>
</div>
<?php
require_once '../classes/flight.php';

$flightManager = new flight();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['newairline_name']) && isset($_POST['newdeparture_city']) && isset($_POST['newarrival_city'])
        && isset($_POST['newdeparture_time']) && isset($_POST['newarrival_time'])) {

        $airline_name = $_POST['newairline_name'];
        $departure_city = $_POST['newdeparture_city'];
        $arrival_city = $_POST['newarrival_city'];
        $departure_time = $_POST['newdeparture_time'];
        $arrival_time = $_POST['newarrival_time'];

        // $result = $flightManager->createFlight($airline_name, $departure_city, $arrival_city, $departure_time, $arrival_time);
    }
}

$flightRecords = $flightManager->getAllflight();

if ($flightRecords) {
    echo "<table>";
    echo "<tr><th>Flight ID</th><th>Flight Name</th><th>Departure City</th><th>Arrival City</th><th>Departure Time</th><th>Arrival Time</th><th>Action</th></tr>";

    foreach ($flightRecords as $flight) {
        echo "<tr>";
        echo "<td>" . $flight["flight_id"] . "</td>";
        echo "<td>" . $flight["airline_name"] . "</td>";
        echo "<td>" . $flight["departure_city"] . "</td>";
        echo "<td>" . $flight["arrival_city"] . "</td>";
        echo "<td>" . $flight["departure_time"] . "</td>";
        echo "<td>" . $flight["arrival_time"] . "</td>";
        echo "<td><a href='../functions/updateflight.php?id=" . $flight["flight_id"] . "'>Update</a> | <a href='../functions/delflight.php?id=" . $flight["flight_id"] . "'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No flights found.";
}
?>
<button><a href ="admin_dashboard.php" > Back</a></button>
</body>
</html>
