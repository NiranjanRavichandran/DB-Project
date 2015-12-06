<?php
include '../functions.php';

//Getting values from form
$username = $_POST['username'];
$password = $_POST['password'];

//Database Connection
$connect = connectDatabase();

$validateSQL = "CALL validatelogin(?, ?, @result, @status)";
$stmt = $connect->prepare($validateSQL);
$stmt->bind_param('ss', $username, $password);
$exe = $stmt->execute();
//$resultSet = $stmt->get_result();
$select = $connect->query('SELECT @result, @status');
$fetched = $select->fetch_assoc();
$result=$fetched['@result'];
$stats=$fetched['@status'];

if($stats == 1){
  session_start();
  $_SESSION["user"] = $result;
  header("Location: ../index.php");
  exit();
}else if($stats == 2){
  header("Location: ../login.php");
  exit();
}else{

}

?>
