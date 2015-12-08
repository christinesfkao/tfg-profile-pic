<?php
  $dburl = parse_url(getenv("DATABASE_URL"));

  function getDatabaseConnection(){
    $host = $dburl["host"];
    $dbname = explode('/', $dburl["path"])[1];
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $dburl['user'], $dburl['pass']);
    return $dbh;
  }
?>
