<!DOCTYPE html>
<html lang="en">

<?php
$title = "Contact";
include './include/head.inc.php';
?>

<body class="contact">
    <!-- navigation -->
    <?php
    include './include/navigation.inc.php';
    ?>
    <!-- contact info -->
    <h1>Contact Us</h1>
    <h2 class="contact-desc">Reach out to find out more about our trucks.</h2>
    <div class="contact-container">
        <div class="contact-info">
            <h2>Contact Info</h2>
            <div>
                <i class="fa-solid fa-phone"></i>
                <p>Phone: (843) 274-8735</p>
            </div>
            <div>
                <i class="fa-solid fa-envelope"></i>
                <p>info@toptrucks.com</p>
            </div>
            <div>
                <i class="fa-solid fa-location-dot"></i>
                <p>Austin, TX</p>
            </div>
        </div>
        <!-- form -->
        <?php
        include './include/contactForm.inc.php';
        ?>
    </div>

    <!-- footer -->
    <?php
    include './include/footer.inc.php';
    ?>

</body>

</html>