<?php
 
// Include confi.php
include_once('config.php');
 
if($_SERVER['REQUEST_METHOD'] == "POST"){
 // Get data
 $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : "";
 $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : "";
 $password = isset($_POST['pwd']) ? $conn->real_escape_string($_POST['password']) : "";
 $status = isset($_POST['status']) ? $conn->real_escape_string($_POST['status']) : "";
 
 // Insert data into data base
 $sql = "INSERT INTO `webServiceRest`.`users` (`ID`, `name`, `email`, `password`, `status`) VALUES (NULL, '$name', '$email', '$password', '$status');";
 


 if($conn->query($sql)){
 $json = array("status" => 1, "msg" => "Done User added!");
 }else{
 $json = array("status" => 0, "msg" => "Error adding user!");
 }
}else{
 $json = array("status" => 0, "msg" => "Request method not accepted");
}
 
$conn->close();
 
/* Output header */
 header('Content-type: application/json');
 echo json_encode($json);
