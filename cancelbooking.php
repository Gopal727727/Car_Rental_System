<?php 
    include './sql_connection.php';
    $username = $_GET['user'];
    $carname = $_GET['car'];
    $sql = "delete from booked where Username = '$username' and car_name='$carname'";
    $result = $conn->query($sql);
    if($result=== TRUE)
    {
        echo "<script> alert('Booking cancelled!!'); window.location.href='index.php'</script>'";
    }
?>