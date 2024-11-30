<?php include 'login_authentication.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log-in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="./formstyle.css" rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <form action="" class="form-signup border border-secondary rounded" onsubmit="return validate();" method="post">
        <button class="close" onclick="window.location.href='index.php'; return false;"><i class="fa fa-window-close"></i></button>
            <h2>Login</h2>
            <br>
            <div class="form-group">
                <input type="text" name="username" id="Username" placeholder="Username" class="form-control">
                <span id="user_err"> </span>
                <?php if(isset($name_error)):?>
                    <span> <?php echo "-> ".$name_error; ?> </span>
                <?php endif ?>
            </div>
            
            <div class="form-group">
                <input type="password" name="password" id="Pass" placeholder="Password" class="form-control">
                <span id="pass_err"> </span>
            </div>
            
            <br>
            <input type="Submit" value="Login" name="Loginbtn" class="btn btn-outline-success">
            <input type="Cancel" value="Cancel" class="btn btn-outline-danger">
        </form>
    </div>
    
    <script src="./validate.js"></script>
</body>
</html>