<?php
  /**
  * Nécessite la bibliothèque "PHP Email Form"
  * La bibliothèque est fournie dans la version pro du template
  * Elle doit être placée dans : vendor/php-email-form/php-email-form.php
  * Pour plus d'infos : https://bootstrapmade.com/php-email-form/
  */

  // Remplacez par votre adresse email de réception
  $receiving_email_address = 'contact@monportfolio.fr';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Impossible de charger la bibliothèque "PHP Email Form" !');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Décommentez et configurez SMTP si vous souhaitez utiliser un serveur SMTP
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'Nom');
  $contact->add_message( $_POST['email'], 'Email');
  if(isset($_POST['phone'])) {
    $contact->add_message( $_POST['phone'], 'Téléphone');
  }
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
