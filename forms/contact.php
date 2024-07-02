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

  require './PHPMailer/src/Exception.php';
  require './PHPMailer/src/PHPMailer.php';
  require './PHPMailer/src/SMTP.php';
  // echo $contact->send();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
      // Crea una nueva instancia de PHPMailer
      $mail = new PHPMailer(true);
  
      try {
          // Configura el envío a través de SMTP
          $mail->isSMTP();
          $mail->SMTPDebug = 2; // Habilita depuración detallada
          $mail->Host = 'smtp.gmail.com';
          $mail->Port = 465;
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Habilita TLS/SSL
          $mail->SMTPAuth = true;
          $mail->Username = 'peluisrodriguez2@gmail.com';
          $mail->Password = 'fgxzfyjoviizpyhs';
  
          // Configura la información del correo electrónico
          $mail->setFrom('peluisrodriguez2@gmail.com', 'Mi Portafolio');
          $mail->addReplyTo($_POST['email'], $_POST['name']);
          $mail->addAddress('rodriguezrojaspedroluis@gmail.com', 'Pedro Rodriguez');
          $mail->Subject = $_POST['subject'];
          $mail->Body = $_POST['message'];
          $mail->isHTML(true); // Configura el cuerpo como HTML
  
          // Envía el correo electrónico
          $mail->send();
          echo 'El correo electrónico se envió correctamente.';
  
      } catch (Exception $e) {
          echo 'Error al enviar el correo electrónico: ', $mail->ErrorInfo;
      }
  }

?>
