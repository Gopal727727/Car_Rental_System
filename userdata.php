
<?php
include 'sql_connection.php';
if(isset($_POST['Submit_Button']))
{
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$sql_username = "Select * from user_info where Username='$username'";
$sql_email = "Select * from user_info where Email='$email'";
$res_user = $conn->query($sql_username);
$res_email = $conn->query($sql_email);


if($res_user->num_rows > 0)
{
    $name_error = "Username is taken";
}
else if($res_email->num_rows > 0)
{
    $email_error = "Email is taken";
}
else
{
    $sql_insert = "insert into user_info(Username,Email,Password,Phone) values('$username','$email','$password','$phone')";
    $res_insert = $conn->query($sql_insert);
    if($res_insert)
    {
        $success = "Account Created";
    }
 
}
}
 $conn -> close();
?>

