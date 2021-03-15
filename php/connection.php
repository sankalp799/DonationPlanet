<?php
  $sqlConnection = new mysqli("localhost", "Sankalp", "mcflono", "thehelpinghand");

  if($sqlConnection->connect_error){
      die("connection failed: " .$sqlConnection->connect_error);
  }
?>