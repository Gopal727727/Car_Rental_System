<?php include '../sql_connection.php';?>
<?php
 if(isset($_POST['editbtn']))
 {
    $id = $_GET['id'];
    $name = $_POST['username'];
    $password = $_POST['pass'];
    $update = "update admin_info set Name='$name',Password='$password' where ID = $id";
    $result = $conn->query($update);
    if($result === true)
    {
        echo "<script> alert('updated');
        window.location.href='setting.php' </script>";
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
    <title>Edit Admin:</title>
    <style>
        form{
            text-align: left;
            display:block;
            margin: 0 auto;
            width: 60vh;
            height: 40vh;
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
        $sql = "select * from admin_info where ID=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {
            $Name = $row["Name"];
            $Password = $row["Password"];
        }
        } 
        else {
        echo "0 results";
        }           
        $conn->close();
        ?>
        <div>
        <form action="editadmin.php?id=<?php echo $id; ?>" enctype="multipart/form-data" method="post" class="">
        <label for="">Name:</label><br>
        <input type="text" name="username" id="" class="form-control-sm" required value="<?php echo $Name;?>">
        <br>
        <label for="">Password:</label><br>
        <input type="text" name="pass" id=""  class="form-control-sm" required value="<?php echo $Password;?>">
        <br>
        <br>
        <input type="submit" value="Edit" name="editbtn" class="btn btn-outline-success"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Cancel" class="btn btn-outline-danger">
        </form>
        </div>
        </div>
        
</div>
<?php include 'script.php'; ?>
    
</body>
</html>