<?php include './sql_connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="./admin/styles.css" />
    <title>Edit User:</title>
    <style>
        form{
            text-align: left;
            display:block;
            margin: 0 auto;
            width: 60vh;
            height: 70vh;
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
        <?php include './admin/sidebar.php'; ?>

        <!-- Page Content -->
        <div>
        <?php include './admin/navbar.php'; ?>
        <?php 
        $id = $_GET['id'];
        $image = $_GET['filename'];
        $sql = "select * from carinfo where ID=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {
            $car = $row['car_model'];
            $price = $row["car_price"];
            $date = $row["car_date"];
            $link = $row["imglink"];
            $description = $row["Description"];
        }
        } 
        else {
        echo "0 results";
        }           
        $conn->close();
        ?>
        <div>
        <form action="editprocess.php?id=<?php echo $id; ?>&filename=<?php echo $image; ?>" enctype="multipart/form-data" method="post" class="" onsubmit="return validate();">
        <label for="">Car_model:</label><br>
        <input type="text" name="model" id="" class="form-control-sm" required value="<?php echo $car;?>" required>
        <br>
        <label for="">Car_price:</label><br>
        <input type="text" name="price" id="price"  class="form-control-sm" required value="<?php echo $price;?>" required>
        <br>
        <label for="">Car_date:</label><br>
        <input type="text" name="date" id="date" class="form-control-sm" required value="<?php echo $date;?>" required>
        <br>
        <label for="">Replace Image?:</label><br>
        <input type="file" name="image" id="" class="form-control-sm" >
        <br>
        <label for="">Description:</label>
        <br>
        <textarea name="description" id="" cols="50" rows="4" class="form-control-sm" required  ><?php echo $description;?></textarea>
        <br>
        <br>
        <input type="submit" value="Edit" name="editbtn" class="btn btn-outline-success"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Cancel" class="btn btn-outline-danger">
        </form>
        </div>
        </div>
        
</div>
<?php include './admin/script.php'; ?>
<script>
    function validate()
    {
        const test_price = /^\d+$/;
        let price = document.getElementById("price").value;
        let date = document.getElementById("date").value;
        if(!test_price.test(price))
        {
            alert("enter valid price");
            return false;
        }
        else if(price<0)
        {
            alert("cant enter negetive price");
            return false;
        }

        if(!test_price.test(date))
        {
            alert("enter valid date");
            return false;
        }
        else if(date<0)
        {
            alert("cant enter negetive price");
            return false;
        }
        
    }
</script>
    
</body>
</html>