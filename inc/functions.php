<?php
  function getDatabaseConnection(){
    $dburl = getenv("DATABASE_URL") != "" ? getenv("DATABASE_URL") : "mysql://tfg:tfg@localhost/tfg";
    $dburl = parse_url($dburl);
    $dbname = explode('/', $dburl["path"])[1];
    $dbh = new PDO("mysql:host=".$dburl['host'].";dbname=".$dbname, $dburl['user'], $dburl['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    return $dbh;
  }
  function getIP(){
    $keys = array("REMOTE_ADDR", "HTTP_X_FORWARDED_FOR", "HTTP_CF_CONNECTING_IP");
    $ip = "";
    foreach($keys as $key){
      if(isset($_SERVER[$key])){
        $ip .= $_SERVER[$key].",";
      }
    }
    return $ip;
  }
?>
