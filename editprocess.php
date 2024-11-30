<?php
//replacing image
include './sql_connection.php';
   $id = $_GET['id'];
   $filename = substr($_GET['filename'],1);
   if(isset($_FILES['image']) )
   {
       define ('SITE_ROOT', realpath(dirname(__FILE__)));
       $errors     = array();
       $maxsize    = 2097152; 
       $acceptable = array(
       'image/jpeg',
       'image/jpg',
       'image/png'
           );

       if(($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) 
       {
           $errors[] = 'File too large. File must be less than 2 megabytes.';
       }

       if((!in_array($_FILES['image']['type'], $acceptable)) && (!empty($_FILES["image"]["type"]))) 
       {
           $errors[] = 'Invalid file type. Only JPG,JPEG and PNG types are accepted.';
       }

       if(count($errors) === 0)
       {

           unlink(SITE_ROOT.$filename);
           move_uploaded_file($_FILES['image']['tmp_name'],SITE_ROOT.$filename);
       } 
       else 
       {
           foreach($errors as $error) 
           {
               echo '<script>alert("'.$error.'");</script>';
           }
       }
   }
       $carmodel = $_POST['model'];
       $price = $_POST['price'];
       $date = $_POST['date'];
       $description = $_POST['description'];
       $update = "update carinfo set car_model='$carmodel',car_price='$price',car_date='$date',Description='$description' where ID = $id";
       $result = $conn->query($update);
       if($result === true)
       {
           echo "<script> alert('updated');
           window.location.href='./admin/Cardetails.php' </script>";
       }
       else{
           echo "update failed!!";
       }
?>