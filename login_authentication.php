<?php
include 'sql_connection.php';
if(isset($_POST['Loginbtn']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$admin_login = "Select * from admin_info where Name='$username' and Password='$password'";
$admin_res = $conn->query($admin_login);
if($admin_res->num_rows == 1)
{
    session_start();
    $_SESSION['admin'] = $username;
    header('Location: ./admin/adminpanel.php');
}
$user_login= "Select * from user_info where Username='$username'";
$res_login = $conn->query($user_login);
$fetch = mysqli_fetch_array($res_login);
$arraypassword="";
if($res_login->num_rows == 1)
{
    $arraypassword = $fetch['Password']; 
}
if($password == $arraypassword)
{
    session_start();
    $session_user = $fetch['Username'];
    $_SESSION['user'] = $session_user;
    echo '<script> alert("Login Sucessfull ' .$_SESSION['user'] . '"); 
    window.location.href="index.php";</script> ';
}
else
{
    echo '<script> alert("Username or Password is incorrect"); </script>';
}
}
 $conn -> close();
?>

