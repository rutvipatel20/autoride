<?php 
use PHPMailer\PHPMailer\PHPMailer;
function sendMail($username,$email,$body){
    require_once "vendor/autoload.php";
    $mail = new PHPMailer();
    //Enable SMTP debugging.
    $mail->SMTPDebug = 3;                           
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();        
    //Set SMTP host name                      
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                      
    //Provide username and password
    $mail->Username = "devloper2804@gmail.com";             
    $mail->Password = "Devloper2804@";                       
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                       
    //Set TCP port to connect to
    $mail->Port = 587;                    
    $mail->From = $email;
    if(!empty($username)){
        $mail->FromName = $username;
    }
    $mail->addAddress($email, "Recepient Name");
    $mail->isHTML(true);
    $mail->Subject = "Autoride";
    $mail->Body = $body;
    $mail->AltBody = "This is the plain text version of the email content";
    if(!$mail->send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
      // echo "Message has been sent successfully";
    }
}

?>