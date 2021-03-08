<?php
    $dsn = "mysql:host=localhost;dbname=files;charset=utf8mb4";
    $username = "root";
    $password = "";

   try{
    $conn = new PDO($dsn,$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    echo "Connection failed ".$e->getMessage();
  }
  
  $sql =$conn->prepare("SELECT * FROM users");
  $sql->execute();
  
  $result = $sql->fetchAll(PDO::FETCH_ASSOC);



?>