<?php
session_start();
include '../functions.php';
$connect = connectDatabase();

$movie = $_POST["movie"];
$city = $_SESSION["currentCity"];
$_SESSION["movie"] = $movie;

//Procedure call to fetch movies
$query = "CALL getTheatresByMovie(?, ?)";
$stmt = $connect->prepare($query);
$stmt->bind_param('ss', $movie, $city);
$stmt->execute();
$result = $stmt->get_result();
echo "<select id='theatres' name='theatres'>";
echo "<option value=''>--</option>";
while ($row = $result->fetch_assoc()){
  echo "<option value='1'>".$row['name']."</option>";
}
echo "</select>";

 ?>
