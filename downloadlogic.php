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

  if(isset($_GET['file_id'])){
      $id =$_GET['file_id'];

      //fetch file 
    $sql =$conn->prepare("SELECT * FROM users WHERE id=$id");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    $filepath ='uploads/'.$result[0]['name'];
    
    if(file_exists($filepath)){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $result[0]['name']));
        readfile('uploads/' . $file['name']);

        //updating downloads
        $newdownload = $result[0]['downloads'];
        try {
            $update =$conn->prepare("UPDATE users SET downloads=$newdownload WHERE id=$id");
            $update->execute();
            echo "Success, the download is now".$newdownload;
            
        } catch (\Throwable $e) {
            //throw $th;
            echo "Nop";
            $e->getMessage();
        }
    }
  }



?>