<?php 
    $placeholder_login="Login";
    $placeholder_loginlink = "./login.php";
    $placeholder_register= "Register";
    $placeholder_reglink = "./register.php";
 ?>
<?php 
    session_start();
    if(isset($_SESSION['user']))
    {
        $placeholder_login=$_SESSION['user'];
        $placeholder_loginlink="#";
        $placeholder_register = "Logout";
        $placeholder_reglink = "./logout.php";
    }
?>
<section class="navigation">
    <div class="navbar">
        <a href="./index.php"><img src="./img/logo.png" alt="logo" class="logo"></a>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="#service">Services</a></li>
            <?php 
                if(isset($_SESSION['user']))
                {
                    echo '<li> <a href="bookinghistory.php"> Booking History </a> </li>';
                }
            ?>
            <li><a href="<?php echo $placeholder_loginlink; ?>">
                <?php echo $placeholder_login; ?>
            </a></li>
            <li><a href="<?php echo $placeholder_reglink; ?>"><?php echo $placeholder_register; ?></a></li>
           
        </ul>
    </div>
</section>