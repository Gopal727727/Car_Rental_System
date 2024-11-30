<?php include '../sql_connection.php';?>
<?php
 if(isset($_POST['editbtn']))
 {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $update = "update user_info set Username='$username',Email='$email',Password='$password',Phone='$phone' where ID = $id";
    $result = $conn->query($update);
    if($result === true)
    {
        echo "<script> alert('updated');
        window.location.href='Userdetails.php' </script>";
    }
    else{
        echo "update failed!!";
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Edit User:</title>
    <style>
        form{
            text-align: left;
            display:block;
            margin: 0 auto;
            width: 60vh;
            height: 50vh;
            border: 1px solid rgb(247, 245, 245);
            display: block;
            background: rgba(216, 214, 214,0.5);
            overflow: hidden;
            margin-top: 5vh;
        }

        .form-control-sm{
            width: 40vh;
        }
    </style>
</head>
<body>
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Page Content -->
        <div>
        <?php include 'navbar.php'; ?>
        <?php 
        $id = $_GET['id'];
        $sql = "select * from user_info where ID=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {
            $user = $row['Username'];
            $pass = $row["Password"];
            $phon = $row["Phone"];
            $email = $row["Email"];
        }
        } 
        else {
        echo "0 results";
        }           
        $conn->close();
        ?>
        <div>
        <form action="edituser.php?id=<?php echo $id; ?>" enctype="multipart/form-data" method="post" class="" onsubmit="return validate();">
        <label for="">Username:</label><br>
        <input type="text" name="username" id="Username" class="form-control-sm" required value="<?php echo $user;?>">
        <br>
        <label for="">Phone:</label><br>
        <input type="text" name="phone" id="Phone"  class="form-control-sm" required value="<?php echo $phon;?>">
        <br>
        <label for="">Email:</label><br>
        <input type="text" name="email" id="Email" class="form-control-sm" required value="<?php echo $email;?>">
        <br>
        <label for="">Password:</label><br>
        <input type="text" name="password" id="Pass" class="form-control-sm" required value="<?php echo $pass;?>">
        <br>
        <br>
        <input type="submit" value="Edit" name="editbtn" class="btn btn-outline-success"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Cancel" class="btn btn-outline-danger">
        </form>
        </div>
        </div>
        
</div>
<?php include 'script.php'; ?>
<script src="./validation.js"></script>
</body>
</html>