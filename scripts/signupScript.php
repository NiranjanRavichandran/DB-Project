<?php
  include '../functions.php';
  $connect = connectDatabase();
  session_start();

  //Procedure call to user signup
  $query = "CALL Signup(?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmt = $connect->prepare($query);
  $date = "2020-02-02";
  $stmt->bind_param('sssssssssssss', $_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['passowrd'], $_POST['add1'], $_POST['add2'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['nameoncard'], $_POST['expirydate'], $_POST['cvv'], $_POST['cardnumber']);
  $stmt->execute();
  $result = $stmt->get_result();
  $_SESSION['LoginAlert'] = "Signup success, Please use your email to login.";
  header("Location: ../login.php");
  exit();

 ?>
