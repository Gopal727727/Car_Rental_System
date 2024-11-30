<div class="banner">
        <div class="content">
            <h1>Car Rent Services</h1>
            <p>Many customers are happy with our services.</p>
            <br>
            <div>
                <?php
                    if(!isset($_SESSION['user']))
                    {
                        echo '<button type="button"><a href="./register.php" style="text-decoration: none; color: #fff;">REGISTER</a></button>
                        <button type="button"><a href="./login.php" style="text-decoration: none; color: #fff;">LOGIN</a></button>';
                    }
                ?>
                
            </div>
        </div>
</div>