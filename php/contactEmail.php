<?php

$result = "Sent Both Emails";
$abcastrology_reply_email = "ckinglewis@yahoo.com";
$abcastrology_admin_email = "ckinglewis@yahoo.com";
$abcastrology_from_email = "no-reply@abcastrology.io";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$name = $_POST['name'];
$message = $_POST['message'];
$email = $_POST['email'];

$date = date_create($birthday);
$birthday = date_format($date, 'M d, Y');

$subject = "ABC Astrology | Contact Us: ".$name;	
$mailMessageAdmin = '
<html>
    <head>
    </head>
    <body style="font-family: sans-serif; text-align: center; background: #fff4e0; padding:40px 0px;">
        <div style="display: inline-block; padding: 20px; background: #fff; border-radius: 10px;">
            <a href="http://www.abcastrology.io"><img class="logo" src="http://www.abcastrology.io/wp-content/themes/abcastrology/assets/mail-logo.jpg" style="width: 160px"></a>
            <h1>'.$name.'</h1>
            <a href="mailto:'.$email.'">'.$email.'</a>
            <br>
            <p>'.$message.'</p>
        </div>
    </body>
</html>

'; //end $mailMessageAdmin;

$mailMessageUser = '
<html>
    <head>
    </head>
    <body style="font-family: sans-serif; text-align: center; background: #fff4e0; padding:40px 0px;">
        <div style="display: inline-block; padding: 20px; background: #fff; border-radius: 10px;">
            <a href="http://www.abcastrology.io"><img class="logo" src="http://www.abcastrology.io/wp-content/themes/abcastrology/assets/mail-logo.jpg" style="width: 160px"></a>
            <h1>'.$name.'</h1>
            <a href="mailto:'.$email.'">'.$email.'</a>
            <br>
            <p>'.$message.'</p>
        </div>
    </body>
</html>

'; //end $mailMessageUser;




$email_is_valid = filter_var($email, FILTER_VALIDATE_EMAIL);

// ---------------------------------------------------------------------------------
//     SEND MAIL TO THE USER
// ---------------------------------------------------------------------------------

if ($email_is_valid) {

    $headers_for_user = $headers.'From: '.$abcastrology_from_email."\r\n" .'Reply-To: '.$abcastrology_reply_email. "\r\n" .'X-Mailer: PHP/' . phpversion();

    try{
        mail($email, $subject, $mailMessageUser, $headers_for_user);
    }
    catch (Exception $e) {
        $result = "Error at user email: " + $e + "\r\n\r\n";
    }
}


// ---------------------------------------------------------------------------------
//     SEND MAIL TO ADMIN
// ---------------------------------------------------------------------------------

if($email_is_valid)
    $headers .= 'From: '.$abcastrology_from_email. "\r\n" .'Reply-To: '.$email. "\r\n" .'X-Mailer: PHP/' . phpversion();
else
    $headers .= 'From: '.$abcastrology_from_email. "\r\n" .'Reply-To: user-email-was-not-valid@abcastrology.io'. "\r\n" .'X-Mailer: PHP/' . phpversion();
   
$to = $abcastrology_admin_email;

try{
    mail($to, $subject, $mailMessageAdmin, $headers);
}
catch (Exception $e) {
    $result += "Error at admin email: " + $e;
    die(json_encode($result));
}

echo $result;

?>