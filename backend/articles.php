<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"]=="GET") {

$sql = "SELECT title, city, surface, address, prix, type, status FROM properties";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>Title</th><th>City</th><th>Surface</th><th>Addresse</th><th>Prix</th><th>Type</th><th>Status</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["title"]."</td><td>".$row["city"]."</td><td>".$row["surface"]."</td><td>".$row["address"]."</td><td>".$row["prix"]."</td><td>".$row["type"]."</td><td>".$row["status"]."</td></tr>";
  }
} else {
  echo "0 results";
}

$connection->close();
}
?>