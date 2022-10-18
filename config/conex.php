<?php

$HOSTNAME = '127.0.0.1';
$USERNAME = 'root';
$PASSWORD = 'gumer4569';
$DBNAME = 'cryptography';

try {
    $conn = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);
  }catch(PDOException $err) {
    echo "ERROR!, No connection: " . $err->getMessage();
  }
  
?>
