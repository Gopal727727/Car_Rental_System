<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>User Details</title>
</head>
<body>
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Page Content -->
        <div>
        <?php include 'navbar.php'; ?>
        <div class="row my-5">
                    <h3 class="fs-4 mb-3">User Booking details:</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-lg  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Carname</th>
                                    <th scope="col">Payment amount</th>
                                    <th scope="col">Rent time</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                     include '../sql_connection.php';
                                     $sql = "SELECT * FROM booked where Status='Pending'";
                                     $result = $conn->query($sql);
                                     if ($result->num_rows > 0) {
                                         while($row = $result->fetch_assoc()) {
                                         echo '<tr> <th>'.$row["ID"]. '</th>';
                                         echo '<th>'.$row["Username"].'</th>';
                                         echo '<th>'.$row["car_name"].'</th>';
                                         echo '<th>'.$row["payment_amount"].'</th>';
                                         echo '<th>'.$row["time_period"].'</th>';
                                         echo '<th> <a href="bookingaccept.php?id='.$row["ID"].'"> Accept </a> | <a href="bookingreject.php?id='.$row["ID"].'"> Reject </a>  </th>';
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
        
</div>
<?php include 'script.php'; ?>
    
</body>
</html>