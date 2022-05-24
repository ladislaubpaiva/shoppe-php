<?php

namespace core\classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ConfirmMailer
{
  public static function sendConfirmMail($clientEmail, $purl)
  {
    //Load Composer's autoloader
    // require 'vendor/autoload.php';
    $link_curl = APP_HOSTNAME . "?page=confirm&purl=" . $purl;
    //HTML email
    function writeHTML($link_curl)
    {
      $text = '<h1>Welcome! to ' . APP_NAME . '</h1>';
      $text .= '<h2>In order to access your account, please confirm your email</h2>';
      $text .= '<p>To confirm the email click the link below</p>';
      $text .= '<p><a href=' . $link_curl . '>Confirm email</a></p>';
      $text .= '<p><small>' . APP_NAME . '</small></p>';
      return $text;
    }
    $html = writeHTML($link_curl);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_OFF;                         //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host = APP_SMTP;                                     //Set the SMTP server to send through
      $mail->SMTPAuth = true;                                     //Enable SMTP authentication
      $mail->Username = APP_EMAIL;                                //SMTP username
      $mail->Password = APP_EMAIL_PSW;                            //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
      $mail->Port = APP_EMAIL_PORT;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom(APP_EMAIL, APP_NAME);
      $mail->addAddress($clientEmail);                            //Add a recipient

      //Content
      $mail->isHTML(true);                                         //Set email format to HTML
      $mail->Subject = APP_NAME . ' Confirm your email address';   //Set the email subject
      $mail->Body = $html;

      $mail->send();

      return true;
    } catch (Exception $e) {
      return false;
    }
  }
  public static function sendRepoPasswordMail($clientEmail)
  {
  }
  public static function sendDeleteAccountMail($clientEmail)
  {
  }
}
