<?php 

function DBconnect($hostname, $dbname, $user, $pass) {

   // $pdo_string = sprintf("'mysql:host=%s;dbname=%s',%s,%s", $hostname, $dbname, $user, $pass);

   try {
      $conn = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $user, $pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }
   return($conn);
}
 ?>
