<?php 
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('Location: login.php');
    }
?>
<?php
    if(isset($_POST['rentbtn']))
    {
        include 'sql_connection.php';
        
        $rentDate = strtotime($_POST["rentDate"]);
        $endDate = strtotime($_POST["endDate"]);
        $currentDate = strtotime(date("Y-m-d"));
        $price = $_GET['price'];

        if ($rentDate < $currentDate || $endDate < $currentDate) {
            echo "<script>alert('Dates cannot be in the past. Please enter future dates.');</script> ";
        } else if($rentDate >= $currentDate || $endDate >= $currentDate) {
            $dateDifference = floor(($endDate - $rentDate) / (60 * 60 * 24));
            $payment = $dateDifference * $price;
        }

        if(isset($payment)){
            $username = $_SESSION['user'];
            $cid = $_GET['id'];
            $cname = $_GET['car'];
            $time = $dateDifference." days";
            $money =  "NRS ".$payment;
             $insert = "insert into booked (car_id,car_name,Username,payment_amount,time_period) values($cid,'$cname','$username','$money','$time')";
            
            $check = "select * from booked where Username='$username' and car_id=$cid";
            $validate = $conn->query($check);
            if($validate->num_rows > 0)
            {
                echo "<script> alert('Already booked!!!');
                window.location.href='index.php'; </script> ";
            }
            else
            {
                $execute = $conn->query($insert);
                if($execute === true)
                {
                echo "<script> alert('Car booked You need to pay Nrs ". $payment . " using Khalti!!');";
                echo "window.location.href='payment.php?pay=".$payment*100 . "'; </script>";
                
                }
                else{
                echo "<script> alert('error'); </script>";
                }
                
            }
        }
        
        

    }
        

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./rentstyle.css">
</head>
<body>
	<?php include 'sql_connection.php'; ?>
    <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "select * from carinfo where ID = $id";
            $result = $conn->query($sql);
        
        if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                $carname = $row["car_model"];
                $carprice = $row["car_price"];
                $cardetails = $row["Description"];
                $link= $row['imglink'];
                }
            } 
        }  
    ?>
    <div class="container">
        <button><a href="index.php"><i class="fa fa-window-close"></i></a></button>
        <div class="detailbox">
        <div class="image">
            <img src="<?php echo $link; ?>" alt="image">
        </div>
        <div>
        <p id="Carname"><?php echo $carname; ?></p>
        <p id="price">N.RS<?php echo $carprice; ?> Per Day</p>
        <p id="details">Car Details:</p>
        <p id="desc"><?php echo $cardetails; ?></p>
        </div>
        </div>
        <br>

        <div class="form">
            <form action="rent.php?id=<?php echo $id; ?>&car=<?php echo $carname;?>&price=<?php echo $carprice ?>" method="post">
            <div class="form-group">
            <label for="rentDate">Enter the rent date:</label>
            <input type="date" name="rentDate" class="form-control-sm"  required>
            <br>
            <label for="endDate">Enter the end date:</label>
            <input type="date" name="endDate" class="form-control-sm"  required> 
            </div>
            <br>
            <input type="submit"  value="Rent Now" name="rentbtn" class="btn btn-outline-success" >
            </form>
        </div>
    </div>
</body>
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
<script src="is.js"> </script>
</html>