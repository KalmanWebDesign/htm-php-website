<!DOCTYPE html>
<html lang="en">

<?php
$title = "Top Trucks";
include './include/head.inc.php';
?>

<body>
    <!-- navigation -->
    <?php
    include './include/navigation.inc.php';
    ?>
    <!-- hero -->
    <section class="hero-container">
        <div class="hero-text">
            <h1>Top Trucks</h1>
            <h2>We buy & sell the best trucks</h2>
            <a href="contact.php">
                <button>Contact Us</button>
            </a>
        </div>
    </section>
    <!-- truck inventory -->
    <h2 class="inventory-header" id="inventory">Truck Inventory</h2>
    <div class="trucks-grid">

        <?php 
        include './include/trucks.inc.php';

        foreach ($truckInventory as $truck) {
            echo "
            <div class='truck' data-id='{$truck[0]}'>
                <img src='{$truck[4]}' alt='{$truck[1]}' loading='lazy'>
                <div>
                    <h2>{$truck[1]}</h2>
                    <p>Price: \${$truck[2]}</p>
                    <p>Mileage: {$truck[3]}</p>
                    <a href='contact.php'>
                        <button>Learn More</button>
                    </a>
                </div>
            </div>
            ";
        }
        ?>
    </div>

    <!-- footer -->
    <?php 
    include './include/footer.inc.php';
    ?>

</body>

</html>