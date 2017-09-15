<?php

require 'inc/PHPMailerAutoload.php';

$fromEmail = 'bambule96@gmail.com';
$fromName = 'Von Buchungsformular';

$sendToEmail = 'bambule96@gmail.com';
$sendToName = 'An Buchungsformular';

$subject = 'Neue Buchungsanfrage';

$checkin = $_POST['checkin'];
$checkout  = $_POST['checkout'];

$newcheckin = date("d.m.Y", strtotime($checkin));
$newcheckout = date("d.m.Y", strtotime($checkout));

// array variable name => Text to appear in the email
$fields = array(
    'name'      => 'Name',
    'surname'   => 'Nachname',
    'personen'  => 'Personen',
    'kinder'    => 'davon Kinder unter 6',
    'address'   => 'Anschrift',
    'postcode'  => 'PLZ',
    'city'      => 'Ort',
    'phone'     => 'Tel.', 
    'email'     => 'Email', 
    'message'   => 'Nachricht'
); 

$okMessage = 'Ihre Anfrage wurde erfolgreich versandt. Wir werden uns schnellstmöglich bei Ihnen melden.';

$errorMessage = 'Da ist etwas schief gelaufen - bitte versuchen Sie es später noch einmal';

error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(0);

try
{

    if(count($_POST) == 0) throw new \Exception('Das Formular ist leer.');
            
    $emailTextHtml = "<h1>Neue Buchungsanfrage</h1><hr>";
    $emailTextHtml .= "<table><tr><th align='left'>Anreise</th><td>$newcheckin</td></tr><tr><th align='left'>Abreise</th><td>$newcheckout</td></tr>";

    foreach ($_POST as $key => $value) {
         
        if (isset($fields[$key])) {
            $emailTextHtml .= "<tr><th align='left'>$fields[$key]</th><td>$value</td></tr>";
        }
    }
    $emailTextHtml .= "</table><hr>";
    $emailTextHtml .= "<p>Testfooter</p>";

    $mail = new PHPMailer;

    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($sendToEmail, $sendToName); // you can add more addresses by simply adding another line with $mail->addAddress();
    $mail->addReplyTo($from);
    
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->msgHTML($emailTextHtml); // this will also create a plain-text version of the HTML email, very handy
    
    
    if(!$mail->send()) {
        throw new \Exception('Email konnte nicht verschickt werden.' . $mail->ErrorInfo);
    }
    
    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    // $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}


// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    
    header('Content-Type: application/json');
    
    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}