<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('../public/img/pic1.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        nav {
            background-color: #4CAF50;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .search-container {
            text-align: center;
            margin-top: 50px;
        }

        input[type=text], select, input[type=date] {
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .flight-results {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>

    <header>
        <h1>Flight Booking</h1>
    </header>

    <nav>
        <a href="#">Flights</a>
        <a href="user.php">sign up</a>
        <a href="login.php">log in</a>

        
    </nav>


    <div class="search-container">
        <form action="search-results.html" method="GET">
            <label for="from">From:</label>
            <input type="text" id="from" name="from" required>

            <label for="to">To:</label>
            <input type="text" id="to" name="to" required>

            <label for="departure-date">Departure time:</label>
            <input type="datetime-local" id="departure_time" name="departure_time" required>

            <input type="submit" value="Search Flights">
        </form>
    </div>

    <div class="flight-results">
        
        <h2>Search Results</h2>
        <?php
        if (isset($searchResults) && !empty($searchResults)) {
            echo "<table>";
            echo "<tr><th>Flight ID</th><th>Flight Name</th><th>Departure City</th><th>Arrival City</th><th>Departure Time</th><th>Arrival Time</th></tr>";

            foreach ($searchResults as $flight) {
                echo "<tr>";
                echo "<td>" . $flight["flight_id"] . "</td>";
                echo "<td>" . $flight["flight_name"] . "</td>";
                echo "<td>" . $flight["departure_city"] . "</td>";
                echo "<td>" . $flight["arrival_city"] . "</td>";
                echo "<td>" . $flight["departure_time"] . "</td>";
                echo "<td>" . $flight["arrival_time"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
        ?>
        
    </div>

</body>
</html>
