<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=mabase1","root","christ");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>