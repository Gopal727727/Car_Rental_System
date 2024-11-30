<?php include 'userdata.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="./formstyle.css" rel="stylesheet"> 
</head>
<body>
    <div>
        <?php if(isset($success)): ?>
            <?php echo '<script> alert("Account created");
               if(window.confirm("Do you want to login?"))
               {
                window.location.href="login.php";
               }
               else{
                window.location.href="index.php";
               }
            </script>' ?>
        <?php endif ?>
    </div>
    <div class="container">
        <form action="" class="form-signup border border-secondary rounded" onsubmit="return validate();" method="post">
            <button class="close" onclick="window.location.href='index.php'"><i class="fa fa-window-close"></i></button>
            <h2>Register</h2>
            <p>Create your free account in minutes.</p>
            <div class="form-group">
                <input type="text" name="username" id="Username" placeholder="Username" class="form-control">
                <span id="user_err"> </span>
                <?php if(isset($name_error)):?>
                    <span> <?php echo "-> ".$name_error; ?> </span>
                <?php endif ?>
            </div>

            <div class="form-group">
                <input type="text" name="email" id="Email" placeholder="Email" class="form-control">
                <span id="email_err"> </span>
                <?php if(isset($email_error)):?>
                    <span> <?php echo "-> ".$email_error; ?> </span>
                <?php endif ?>
            </div>
            
            <div class="form-group">
                <input type="text" name="phone" id="Phone" placeholder="Phone Number" class="form-control">
                <span id="phone_err"> </span>
            </div>

            <div class="form-group">
                <input type="password" name="password" id="Pass" placeholder="Password" class="form-control">
                <span id="pass_err"> </span>
            </div>

            <div class="form-group">
                <input type="password" name="cpassword" id="Cpass" placeholder="Confirm Password" class="form-control">
                <span id="cpass_err"> </span>
            </div>
            
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" required>
                    <label class="form-check-label" for="flexSwitchCheckDefault">I accept <a href="#" style=" text-decoration: none;">terms and conditions</a></label>
                </div>
            </div>
            <br>
            <input type="submit" value="Submit" name="Submit_Button" class="btn btn-outline-success">
            <input type="reset" value="Cancel" class="btn btn-outline-danger">
        </form>
    </div>
    
    <script src="./validate.js"></script>
    <br>
</body>
</html>