<?php
error_reporting(E_ALL);
ini_set("display errors", "On");

// Err Values
$fnameErr = $lnameErr = $emailErr = $messageErr = "";
// form variables
$fname = $lname = $email = $message = "";
// display after submitting
$formDisplay = '';
// test if validation passes
$validationPass = true;

// clean inputs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// form validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required";
        $validationPass = false;
    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
        $validationPass = false;
    } else {
        $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $validationPass = false;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Enter a valid email";
        $validationPass = false;
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
        $validationPass = false;
    } else {
        $message = test_input($_POST["message"]);
    }

    if ($validationPass) {

        $mail = new PHPMailer(true);

        try {
            // server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kalmanwebdesign@gmail.com';
            $mail->Password = 'YOUR APP PASSWORD HERE';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // recipients
            $mail->setFrom('Toptrucks@info.com', 'Top Trucks');
            $mail->addAddress('kalmanwebdesign@gmail.com', 'Kalman Web Design');

            // content
            $mail->isHTML(true);
            $mail->Subject = "Top Truck - Form Submission";
            $mail->Body = "
            <html>
            <head>
                <title>Top Truck - Form Submission</title>
                <style>
                    .submission {
                        margin: 1rem;
                    }

                    .submission div {
                        display: flex;
                    }

                    .submission p, .submission h3 {
                        color: #000;
                        margin-right: 1rem;
                    }
                </style>
                </head>

                <body>
                    <div class='submission'>
                        <h3>Form Submission</h3>
                        <div>
                            <p>First Name:</p>
                            <p>$fname</p>
                        </div>
                        <div>
                            <p>Last Name:</p>
                            <p>$lname</p>
                        </div>
                        <div>
                            <p>Email:</p>
                            <p>$email</p>
                        </div>
                        <div>
                            <p>Message:</p>
                            <p>$message</p>
                        </div>
                    </div>
                </body>
            </html>
            
            ";

            $mail->send();
            $formDisplay = '
            <div class="submission" id="target">
                <h3>Your Message was sent!</h3>
            </div>
            
            ';

        } catch (Exception $e) {
            $formDisplay = '
            <div class="submission" id="target">
                <h3>Message could not be sent. Try again or call us directly.</h3>
            </div>';
        }

        $fname = $lname = $email = $message = "";
    }
}

?>



<div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#target" method="POST">
        <h2>Reach Out</h2>
        <label for="fname">First Name</label>
        <span class="error"><?php echo $fnameErr ?></span>
        <input type="text" id="fname" name="fname" value="<?php echo $fname ?>">
        <label for="lname">Last Name</label>
        <span class="error"><?php echo $lnameErr ?></span>
        <input type="text" id="lname" name="lname" value="<?php echo $lname ?>">
        <label for="email">Email</label>
        <span class="error"><?php echo $emailErr ?></span>
        <input type="text" id="email" name="email" value="<?php echo $email ?>">
        <label for="message">Message</label>
        <span class="error"><?php echo $messageErr ?></span>
        <textarea type="text" id="message" name="message" value="<?php echo $message ?>"></textarea>
        <button type="submit">Submit</button>
    </form>

    <?php 
    echo $formDisplay;
    ?>
</div>