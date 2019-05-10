<?php
    if(isset($_POST['submit'])) {
        $name = "";
        $email = "";
        $subject = "";
        $message = "";
        
        if(isset($_POST['visitor_name'])) {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        }
        
        if(isset($_POST['visitor_email'])) {
            $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        }
        
        if(isset($_POST['email_title'])) {
            $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        }
        
        if(isset($_POST['message'])) {
            $message = htmlspecialchars($_POST['message']);
        }
        
        $recipient = "leesnap@umich.edu";
        
        $headers  = "From: $email \r\n";
        
        mail($recipient, $subject, $content, $mailheader) or die("Error!");
        echo "Email sent!";
        /*if(mail($recipient, $email_title, $visitor_message, $headers)) {
            echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
        } else {
            echo '<p>We are sorry but the email did not go through.</p>';
        }*/
        
    }
    
    ?>

/*<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $content="From: $name \n Email: $email \n Message: $message";
    $recipient = "leesnap@umich.edu";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $content, $mailheader) or die("Error!");
    echo "Email sent!";
?>*/
