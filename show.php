<?php
include "db.inc.php";
try{
  $dbh = getDatabaseConnection();
  $stmt = $dbh->prepare("SELECT code, ctime FROM records WHERE code LIKE :code ORDER BY ctime DESC");
  $stmt->exec(array(
    ":code" => "%"
  ));
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode(array("result" => "success", "data" => $result));
}catch(PDOException $e){
  http_response_code(500);
  echo json_encode(array("message" => $e->getMessage(), "line" => $e->getLine()));
  die();
}
?>
