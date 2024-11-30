<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Booking history</title>
</head>
<body>
        <div class="row my-5">
                    <h3 class="fs-4 mb-3">Booking history:</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-lg  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="0">Username</th>
                                    <th scope="col">Car model</th>
                                    <th scope="col">Payment amount</th>
                                    <th scope="col">Rent Time</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                               include './sql_connection.php';
                               session_start();
                               $username=$_SESSION['user'];
                               $sql = "SELECT * FROM booked where Username='$username'";
                                     $result = $conn->query($sql);
                                     if ($result->num_rows > 0) {
                                         while($row = $result->fetch_assoc()) {
                                         echo '<tr>';
                                         echo '<th>'.$row["Username"].'</th>';
                                         echo '<th>'.$row["car_name"].'</th>';
                                         echo '<th>'.$row["payment_amount"].'</th>';
                                         echo '<th>'.$row["time_period"].'</th>';
                                         echo '<th><a href="index.php"> Back </a> | <a href="cancelbooking.php?user='.$row["Username"].'&car='.$row["car_name"].'"> cancel </a></th>';
                                         echo '</tr>';
                                         }
                                         } 
                                         else {
                                             echo "0 results";
                                         }           
                                             $conn->close();
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    
</body>
</html>