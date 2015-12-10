<?php
include '../functions.php';

//Getting values from form
$username = $_POST['username'];
$password = $_POST['password'];

//Database Connection
$connect = connectDatabase();

$validateSQL = "CALL validatelogin(?, ?, @result, @status, @userId)";
$stmt = $connect->prepare($validateSQL);
$stmt->bind_param('ss', $username, $password);
$exe = $stmt->execute();
// $stmt->get_result();
$select = $connect->query('SELECT @result, @status, @userId');
$fetched = $select->fetch_assoc();
$result=$fetched['@result'];
$stats=$fetched['@status'];

if($stats == 1){
  session_start();
  $_SESSION["user"] = $result;
  $_SESSION["userId"] = $fetched['@userId'];
  header("Location: ../index.php");
  exit();
}else if($stats == 2){
  session_start();
  $_SESSION['LoginAlert'] = $result;
  header("Location: ../login.php");
  exit();
}else{
  session_start();
  $_SESSION['LoginAlert'] = $result;
  header("Location: ../login.php");
  exit();
}

?>
