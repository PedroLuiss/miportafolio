<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'contact@example.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  // /*
  // $contact->smtp = array(
  //   'host' => 'example.com',
  //   'username' => 'example',
  //   'password' => 'pass',
  //   'port' => '587'
  // );
  // */

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require './PHPMailer/src/Exception.php';
  require './PHPMailer/src/PHPMailer.php';
  require './PHPMailer/src/SMTP.php';
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->SMTPDebug = 2;
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Username = 'rodriguezrojaspedroluis@gmail.com';
      $mail->Password = 'your-gmail-password';
      $mail->setFrom('rodriguezrojaspedroluis@gmail.com', 'Your Name');
      $mail->addReplyTo($_POST['email'], $_POST['name']);
      $mail->addAddress('rodriguezrojaspedroluis@gmail.com', 'Your Name');
      $mail->Subject = $_POST['subject'];
      $mail->msgHTML($_POST['message'], __DIR__);
      $mail->Body = 'This is just a plain text message body';
      if (!$mail->send()) {
          echo 'Mailer Error: '. $mail->ErrorInfo;
      } else {
          echo 'The email message was sent.';
      }
  }

?>
