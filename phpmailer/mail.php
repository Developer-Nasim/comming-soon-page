<?php 

$name  = $_POST['name'];
$email = $_POST['email'];
$sub = $name." just subscribed";
$msg = $name." I just subscribed us to get update first";

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


$mail->isSMTP(); // send as HTML
$mail->Host = "smtp.gmail.com"; // SMTP servers
$mail->Port = 587; //specify SMTP Port
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'tls';


$mail->Username = "ajnasim72@gmail.com"; // Your mail
$mail->Password = 'Ajnasim016'; // Your password mail


$mail->setFrom('ajnasim72@gmail.com',$name);
$mail->addAddress('ajnasim72@gmail.com');
$mail->addReplyTo('ajnasim72@gmail.com');
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




<?php 
    
// $mail->isSMTP(); // send as HTML
// $mail->Host = "mail.foodpass.nl"; // SMTP servers
// $mail->SMTPAuth = true; // turn on SMTP authentication
// $mail->Username = "sendmail@foodpass.nl"; // Your mail
// $mail->Password = 'saA@1-s2#'; // Your password mail
// $mail->Port = 587; //specify SMTP Port
// $mail->SMTPSecure = 'tls';                               
// $mail->setFrom($email,$name);
// $mail->addAddress('aj');
 