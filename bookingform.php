<?php

require 'inc/PHPMailerAutoload.php';

$gast_vorname = $_POST['name'];
$gast_nachname = $_POST['surname'];
$gast_name = $gast_vorname." ".$gast_nachname;

$gast_mail = $_POST['email'];

$fromEmail = 'info@ferienhaus-holzer.at';
$fromName = 'Ferienhaus Holzer';

$sendToEmail = 'info@ferienhaus-holzer.at';
$sendToName = 'Ferienhaus Holzer';

$subject = 'Ferienhaus Holzer - Buchungsanfrage';

$checkin = $_POST['checkin'];
$checkout  = $_POST['checkout'];

$newcheckin = date("d.m.Y", strtotime($checkin));
$newcheckout = date("d.m.Y", strtotime($checkout));

// array variable name => Text to appear in the email
$fields = array(
    'name'      => 'Name',
    'surname'   => 'Nachname',
    'wohnung'   => 'Wohnung', 
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
            
    $emailTextHtml = "

    <html>
        <head>
            <style type='text/css'>
            body {
              margin: 0;
              padding: 0;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%;
            }
            table {
              border-spacing: 0;
            }
            table td {
              border-collapse: collapse;
            }
            .ExternalClass {
              width: 100%;
            }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%;
            }
            .ReadMsgBody {
              width: 100%;
              background-color: #ebebeb;
            }
            table {
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
            }
            img {
              -ms-interpolation-mode: bicubic;
            }
            .yshortcuts a {
              border-bottom: none !important;
            }
            @media screen and (max-width: 599px) {
              .force-row,
              .container {
                width: 100% !important;
                max-width: 100% !important;
              }
            }
            @media screen and (max-width: 400px) {
              .container-padding {
                padding-left: 12px !important;
                padding-right: 12px !important;
              }
            }
            .ios-footer a {
              color: #aaaaaa !important;
              text-decoration: underline;
            }

            .mail-title {
                float:right;

            }

            hr {
                margin: 20px 0 20px 0;
            }

            .form_item {
                width:100%;
                padding-bottom: 30px;
            }

            .key {
                float:left;
                width: 30%;
                font-weight: bold;
            }

            .value {
                float: left;
                width: 70%;
            }

            .mail_foot {
                clear: both;
                padding-top: 20px;
            }
            </style>
            </head>

            <body  bgcolor='#F0F0F0' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0' style='margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;' >


            <table border='0' width='100%' height='100%' cellpadding='0' cellspacing='0' bgcolor='#F0F0F0' style='border-spacing:0;mso-table-lspace:0pt;mso-table-rspace:0pt;' >
              <tr>
                <td align='center' valign='top' bgcolor='#F0F0F0' style='background-color:#F0F0F0;border-collapse:collapse;' >

                  <br>

                  <table border='0' width='600' cellpadding='0' cellspacing='0' class='container' style='width:600px;max-width:600px;border-spacing:0;mso-table-lspace:0pt;mso-table-rspace:0pt;' >
                    <tr>
                      <td class='container-padding header' align='left' style='font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px;border-collapse:collapse;' >
                        <img src='http://dev.ferienhaus-holzer.at/img/logo_dark.png' style='-ms-interpolation-mode:bicubic;' > <span class='mail-title' style='float:right;' ></span>
                      </td>
                    </tr>
                    <tr>
                      <td class='container-padding content' align='left' style='padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff;border-collapse:collapse;' >
                        <br>

            <div class='title' style='font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550;' >Vielen Dank f&uuml;r Ihre Anfrage</div>
            <br>

            <div class='body-text' style='font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333;' >
              <p>Wir freuen uns, dass Sie Interesse an einem Urlaub in unserem Ferienhaus am Faaker See haben.</p>
              <p>Ihre Anfrage mit den folgenden Daten ist bei uns eingegangen.</p>
              <hr style='margin-top:20px;margin-bottom:20px;margin-right:0;margin-left:0;' >

    ";
    $emailTextHtml .= "

    <div class='form_item' style='width:100%;padding-bottom:30px;' >
        <div class='key' style='float:left;width:30%;font-weight:bold;' >Anreise</div>
        <div class='value' style='float:left;width:70%;' >$newcheckin</div>
    </div>

    <div class='form_item' style='width:100%;padding-bottom:30px;' >
        <div class='key' style='float:left;width:30%;font-weight:bold;' >Abreise</div> 
        <div class='value' style='float:left;width:70%;' >$newcheckout</div>
    </div>

    ";

    foreach ($_POST as $key => $value) {
         
        if (isset($fields[$key])) {
            $emailTextHtml .= "

            <div class='form_item' style='width:100%;padding-bottom:30px;' >
                <div class='key' style='float:left;width:30%;font-weight:bold;' >$fields[$key]</div>    
                <div class='value' style='float:left;width:70%;' >$value</div>
            </div>

            ";
        }
    }
    $emailTextHtml .= "

              <div class='mail_foot' style='clear:both;padding-top:20px;' >
                <hr style='margin-top:20px;margin-bottom:20px;margin-right:0;margin-left:0;' >Wir werden uns schnellstm&ouml;glich mit Ihnen in Verbindung setzen.<br>
                    Mit freundlichen Gr&uuml;&szlig;en<br>
                    Familie Holzer
              </div>

            </div>



                      </td>
                    </tr>
                    <tr>
                      <td class='container-padding footer-text' align='left' style='font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px;border-collapse:collapse;' >
                        <br><br>
                        
                        <strong>Ferienhaus Holzer</strong><br>
                        <span class='ios-footer'>
                          Waubergweg 12b<br>
                          A-9580 Egg am Faaker See<br>
                          Tel.  +43 425 4373 9<br>
                        </span>
                        <a href='http://www.ferienhaus-holzer.at' style='color:#aaaaaa;' >www.ferienhaus-holzer.at</a><br>

                        <br><br>

                      </td>
                    </tr>
                  </table>



                </td>
              </tr>
            </table>     
        </body>
    </html>

    ";
    

    $mail = new PHPMailer;

    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($sendToEmail, $sendToName);
    $mail->addAddress($gast_mail,$gast_name); // you can add more addresses by simply adding another line with $mail->addAddress();
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