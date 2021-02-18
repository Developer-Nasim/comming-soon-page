<?php 

$name  = $_POST['name'];
$email = $_POST['email'];
$sub = $name." just subscribed";
$msg = $name." just subscribed us to get update first <br> Name : ".$name." <br> E-mail: ".$email;

$result = "";
$error  = "";



require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
 

// if using latest version of PHP
$mail->SMTPOptions = array(
    'ssl'   => array(
        'veryfy_peer'           => false,
        'veryfy_peer_name'      => false,
        'allow_self_signed'     => true
    )
);


$mail->Host = "mail.foodpass.nl"; // SMTP servers
$mail->Port = 587; //specify SMTP Port
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'tls';


$mail->Username = "sendmail@foodpass.nl"; // Your mail
$mail->Password = 'saA@1-s2#'; // Your password mail


$mail->setFrom('sendmail@foodpass.nl',$name);

$mail->addAddress('foodpass.online@gmail.com');
$mail->addReplyTo('foodpass.online@gmail.com');

$mail->isHTML(true);
$mail->Subject= $sub;
$mail->Body='<h3>'.$msg.'</h3>';
if(!$mail->send())
{
    $error = "Something went worng. Please try again.";
}
else 
{
    $result="Thanks\t" .$name. " for subscribe.";
}
 
echo $result."".$error;


 
?>
