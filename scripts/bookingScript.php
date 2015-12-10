<?php
session_start();
include '../functions.php';
$connect = connectDatabase();

//Getting form elements
if (isset($_SESSION['currentCity'])){
  if (isset($_SESSION['userId'])){
    $city = $_SESSION['currentCity'];
    // $movie = $_SESSION['movie'];
    $theatre = $_SESSION['theatre'];
    $numberOfTickets = $_POST['ticketsCount'];
    $showId = $_POST['selectedShow'];
    $userId = $_SESSION['userId'];

    //Procedure call to DB
    $query = "CALL insertBookings(?, ?, ?, @booking_id)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param('iii', $userId, $showId, $numberOfTickets);
    $stmt->execute();
    $result = $stmt->get_result();
    $select = $connect->query('SELECT @booking_id');
    $fetched = $select->fetch_assoc();
    $id = $fetched['@booking_id'];
    header("Location: ../bookinStatus.php");
    exit();
  } else {
    $_SESSION['loginAlert'] = "Please login to book tickets";
    header("Location: ../book.php");
    exit();
  }
}
?>
