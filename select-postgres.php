<?php


$servername = "10.1.43.22";
$port = "5432";

// REPLACE with your Database name
$dbname = "arduinodb";
// REPLACE with Database user
$username = "esp8266";
// REPLACE with Database user password
$password = "Esp8266_";

$voltage = $measure_time = "";

echo "Hello World";

$conn_string = "host=" . $servername . " port=" . $port . " dbname=" . $dbname . " user=" . $username . " password=" . $password . "";
$conn = pg_pconnect($conn_string);

if (!$conn) {
  echo "Ein Fehler ist aufgetreten.\n";
  exit;
}

$result = pg_query($conn, "SELECT voltage, measure_time FROM solar_data");
if (!$result) {
  echo "Ein Fehler ist aufgetreten.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {
  echo "voltage: $row[0]  Date: $row[1]";
  echo "<br />\n";
}
?>
