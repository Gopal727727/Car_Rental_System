<?php 
    include '../sql_connection.php';
    if(isset($_GET['id']))
    {
        $id= $_GET['id'];
        $sql_status = "update booked set Status='Accepted' where ID=$id";

        $sql_user = "select * from booked where ID=$id";
        $res_user = $conn->query($sql_user);
        $array_user = $res_user->fetch_assoc();

        $username = $array_user['Username'];

        $sql_email="select Email from user_info where Username='$username'";
        $res_email = $conn->query($sql_email);
        $array_email = $res_email->fetch_assoc();

        $email = $array_email['Email'];
        $msg = $username." your request to rent " . $array_user['car_name']." has been accepted.";
       
        if(mail($email,"Car request result",$msg))
        {
            $res_status = $conn->query($sql_status);
            echo "email sent!!";
        }
        else
        {
            echo "couldnt send email sorry!!";
        }

    }
?>