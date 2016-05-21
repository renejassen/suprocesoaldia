<?php
require("PHPMailerAutoload.php");
if($_POST)
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

        //exit script outputting json data
        $output = json_encode(
        array(
            'type'=>'error',
            'text' => 'Request must come from Ajax'
        ));

        die($output);
    }

    //check $_POST vars are set, exit if any missing
    if(!isset($_POST["email"]))
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
        die($output);
    }

    //Sanitize input data using PHP filter_var().
    $user_Name       = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $user_Email       = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $user_Telephone       = filter_var($_POST["telephone"], FILTER_SANITIZE_STRING);
    $user_Message       = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    $mensaje='
      Nombre: '.$user_Name.'<br />
      Email: '.$user_Email.'<br />
      Teléfono: '.$user_Telephone.'<br />
      Mensaje: '.$user_Message.'<br />
    ';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Set who the message is to be sent from
    $mail->setFrom('info@suprocesoaldia.com', 'Info');
    //Set an alternative reply-to address
    //$mail->addReplyTo('replyto@example.com', 'First Last');
    //Set who the message is to be sent to
    // $mail->addAddress('info@suprocesoaldia.com', 'Su Proceso Al Dia');
    $mail->addAddress('javiervaron1@gmail.com');
    //Set the subject line
    $mail->Subject = 'Contacto suprocesoaldia.com';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    // $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
    $mail->isHTML(true);
    $mail->Body    = $mensaje;
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';

    if(!$mail->send()) {
        $output = json_encode(array('type'=>'error', 'text' => $mail->ErrorInfo));
        die($output);
    }
    else {
        // $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_Name .' Thank you for your email'));
        $output = 'OK';
        die($output);
        //echo 'enviado';
    }
}
?>
