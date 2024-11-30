<!DOCTYPE html>
<?php  include '../sql_connection.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Car Details</title>
</head>
<body>
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Page Content -->
        <div>
        <?php include 'navbar.php'; ?>
        <div class="row my-5">
                    <h3 class="fs-4 mb-3">Car Details:</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-lg  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="0">ID</th>
                                    <th scope="col">Car_model</th>
                                    <th scope="col">Car_price</th>
                                    <th scope="col">Car_date</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                    $sql = "SELECT * FROM carinfo";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                        echo '<tr> <th>'.$row["ID"]. '</th>';
                                        echo '<th>'.$row["car_model"].'</th>';
                                        echo '<th>'.$row["car_price"].'</th>';
                                        echo '<th>'.$row["car_date"].'</th>';
                                        echo '<th>  <img src=".'.$row["imglink"].'"'.' alt="photo" width="300" height="200">'.'</th>';
                                        echo '<th>'.$row["Description"].'</th>';
                                        echo '<th> <a href="../editcar.php?id='.$row["ID"].'&filename='.$row["imglink"].'"> Edit </a> | <a href="../deletecar.php?id='.$row["ID"].'&filename='.$row["imglink"].'"> Delete </a> </th>';
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