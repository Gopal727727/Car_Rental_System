<?php include '../upload.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>addcar</title>
    <style>
        form{
            text-align: left;
            display:block;
            margin: 0 auto;
            width: 75vh;
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
        <?php include 'sidebar.php'; ?>

        <!-- Page Content -->
        <div>
        <?php include 'navbar.php'; ?>
        <div>
        <form action="" enctype="multipart/form-data" method="post" class="" onsubmit="return validate();">
        <label for="">Car Model:</label><br>
        <input type="text" name="model" id="carname" class="form-control-sm" required>
        <br>
        <label for="">Car rent price:</label><br>
        <input type="text" name="price" id="price"  class="form-control-sm"required>
        <br>
        <label for="">Car date:</label><br>
        <input type="text" name="date" id="date" class="form-control-sm" required>
        <br>
        <label for="">Description:</label>
        <br>
        <textarea name="description" id="" cols="50" rows="4" class="form-control-sm"></textarea>
        <br>
        <label for="upload">Upload Car Image:</label>
        <input type="file" name="image" id="" required class="form-control-sm" >
        <br>
        <br>
        <input type="submit" value="submit" name="submit" class="btn btn-outline-success"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Cancel" class="btn btn-outline-danger">
        </form>
        </div>
        </div>
        
</div>
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
<?php include 'script.php'; ?>
    
</body>
</html>