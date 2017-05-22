<?php
 // Include confi.php
 include_once('config.php');
 
 $uid = isset($_GET['uid']) ?$conn->real_escape_string($_GET['uid']) :  "";
 if(!empty($uid)){
 $qur = $conn->query("select name, email, status from `users` where ID='$uid'");
 $result =array();
 while($r = $qur->fetch_array(MYSQLI_ASSOC)){
 extract($r);
 $result[] = array("name" => $name, "email" => $email, 'status' => $status); 
 }
 $json = array("status" => 1, "info" => $result);
 }else{
 $json = array("status" => 0, "msg" => "User ID not define");
 }
$conn->close();;
 
 /* Output header */
 header('Content-type: application/json');
 echo json_encode($json);
