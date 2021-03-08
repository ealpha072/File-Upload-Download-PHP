<?php
    $dsn = "mysql:host=localhost;dbname=files;charset=utf8mb4";
    $username = "root";
    $password = "";

   try{
    $conn = new PDO($dsn,$username,$password);

    //set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!!"."<br>";
    //$conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
  }catch(Exception $e){
    echo "Connection failed ".$e->getMessage();
  }

  if (isset($_POST["upload"])) {
      //we get the name
      $filename =$_FILES["myfile"]["name"];

      //set file destination
      $destination = "uploads/".$filename;

      //get file extension
      $extension = pathinfo($filename, PATHINFO_EXTENSION);

      //ON THE UPLOADS directory
      $file =$_FILES['myfile']['tmp_name'];
      $size =$_FILES['myfile']['size'];

      if(!in_array($extension, ['zip','pdf','png','jpg'])){
        echo "Your file extension is not allowed";
      }elseif ($_FILES['myfile']['size'] > 1000000){
          echo "File too large";

      }else{
          //move the uploaded file to its destination
          if(move_uploaded_file($file,$destination)){
            try {
                //code...
                $sql =$conn->prepare("INSERT INTO users(id, name, size, downloads) VALUES (1, '$filename', '$size', '0')");
                $sql->execute();

                echo "Upload successfull!!!!!";
              } catch (\Throwable $e) {
                  //throw $th;
                  echo "Failed ".$e->getMessage();
              }
          }else{
              echo "Failed to upload file";
          }
      }
  }

?>