<?php 
include 'sql_connection.php';
if(isset($_POST['submit']))
{
    $model=$_POST['model'];
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $price=$_POST['price'];
    $date=$_POST['date'];
    $description = $_POST['description'];
    if(isset($_FILES['image']))
    {
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
    move_uploaded_file($_FILES['image']['tmp_name'],SITE_ROOT.'/img/'.$_FILES['image']['name']);
    $imagelink="./img/".$_FILES['image']['name'];
    } 
    else 
    {
        foreach($errors as $error) 
        {
            echo '<script>alert("'.$error.'");</script>';
        }
    }
    }

    $sql_insert = "insert into carinfo (car_model,car_price,car_date,imglink,Description) values('$model',$price,'$date','$imagelink','$description')";
    $res_insert = $conn->query($sql_insert);
    if($res_insert)
    {
        echo "Car inserted";
    }
    else 
    {
        echo "not inserted";
    }
    $conn-> close();
    die();
}
?>