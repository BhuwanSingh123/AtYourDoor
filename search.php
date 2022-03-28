<?php

echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
require './database.php';
    if (!isset($_POST["search"])) {
        echo "Please make a search to continue";
        header('location:./index.php');
    }else{
        $search = $_POST['searchterm'];
        echo "Search result for $search";


        $query = "Select * from products where product_name like '%$search%'";
        if ($data = $conn->query($query)) {
            if ($data->num_rows > 0) {
                echo "<br>Data found";
                while ($row = $data->fetch_assoc()) {
                    ?>
                    <div class="card" style="width: 48rem;">
                        <img class="card-img-top" src=".<?php echo $row['image']?>" alt="image not found.">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['product_name']?>
                </h5>
                <p class="card-text">Rs. <?php echo $row['product_price']?></p>
            </div>
                    </div>
                        
                    <?php
                }
            }else{
                echo "<br>Data not found";
            }
        }else{
            echo "<br>Connection failed";
        }
    }   

?>