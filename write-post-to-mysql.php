<?php


$servername = "localhost";

// REPLACE with your Database name
$dbname = "esp_data";
// REPLACE with Database user
$username = "esp8266";
// REPLACE with Database user password
$password = "Esp8266_";

$voltage = $sensor = "";

echo "Hello World";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $voltage = test_input($_POST["voltage"]);
        $sensor = test_input($_POST["sensor"]);

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        $sql = "INSERT INTO SensorData (voltage, sensor) VALUES ('" . $voltage . "', '" . $sensor . "')";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
