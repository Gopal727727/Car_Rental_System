
        <div class="heading">
            <span>BEST SERVICES</span>
            <h1>Explore Our Top Deals <br> From Top Rated Dealers</h1>
        </div>

        <div class="container" id="service">
        <?php
        $sql = "SELECT * FROM carinfo";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo '<div class="carbox">
              <div class="car_img">'.'<img src="'.$row["imglink"].'" alt="car"> </div>'.'<p>'.$row["car_date"]
              .'</p>'.'<h3>'.$row["car_model"].'</h3>'.'<h2>NRS '.$row["car_price"].'<span>/ Day</span></h2>'; 
              
        echo '<a href="./rent.php?id='.$row['ID'].'"' .'" class="rent_btn">
        Rent Now </a> </div>';
        }
        } 
        else {
            echo "0 results";
        }           
            $conn->close();
        ?>  
        </div>
