<?php
include "db.inc.php";
if(!isset($_POST['code'])){
  http_response_code(400);
  die();
}
try{
  $dbh = getDatabaseConnection();
  $stmt = $dbh->prepare("INSERT INTO records (code, ip, ua, ctime) VALUES(:code, :ip, :ua, NOW())");
  $stmt->exec(array(
    ":code" => $_POST['code'],
    ":ip" => isset($_SERVER['HTTP_CF_CONNECTING_IP']) ? $_SERVER['HTTP_CF_CONNECTING_IP'] : $_SERVER['HTTP_X_FORWARDED_FOR'],
    ":ua" => $_SERVER['HTTP_USER_AGENT']
  ));
  echo json_encode(array("result" => "success"));
}catch(PDOException $e){
  http_response_code(500);
  echo json_encode(array("message" => $e->getMessage(), "line" => $e->getLine()));
  die();
}
?>
