<?php
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

                        <p>
                            Name: <?php echo $row['product_name']?>
                        </p>
                        <p>
                            Price: <?php echo $row['product_price']?>
                        </p>
                        <p>
                            Image: <img src="<?php echo $row['image']?>" alt="">
                        </p>
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