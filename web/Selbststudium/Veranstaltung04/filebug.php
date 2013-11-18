<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once('config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/swift/swift_required.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/php/rechapcha/recaptchalib.php');

// Suppress DateTime warnings
date_default_timezone_set(@date_default_timezone_get());

$privatekey = "6LfZH-gSAAAAACBjnvDg8VEzYkY-j0LVC2IaKavM";

// check the CAPTCHA
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    setStatus("captchaerror");
}

//Form data
$form_username = htmlspecialchars($_POST['username']);
$form_password = htmlspecialchars($_POST['password']);

$form_name = htmlspecialchars($_POST['name']);
$form_email = htmlspecialchars($_POST['email']);
$form_website = htmlspecialchars($_POST['website']);

$form_tel = htmlspecialchars($_POST['tel']);
$form_callback = isset($_POST['callback']) ? "Yes" : "No";

$form_bugtype = htmlspecialchars($_POST['bugtype']);
$form_priority = htmlspecialchars($_POST['priority']);
$form_reproducible = htmlspecialchars($_POST['reproducible']);

$form_date = htmlspecialchars($_POST['date']);

$form_description = htmlspecialchars($_POST['description']);

if(!$_FILES['upload']['error'] === 0){
    setStatus("fileerror");
}

$file = $_FILES['upload'];

$content = <<<EOL
<table>
<tr><th>Field</th><th>Value</th></tr>
<tr>
<td>Name</td><td>$form_name</td>
</tr><tr>
<td>Email</td><td>$form_email</td>
</tr><tr>
<td>Date</td><td>$form_date</td>
</tr><tr>
<td>Website URL</td><td>$form_website</td>
</tr><tr>
<td>Telephone</td><td>$form_tel</td>
</tr><tr>
<td>Description</td><td>$form_description</td>
</tr><tr>
<td>BugType</td><td>$form_bugtype</td>
</tr><tr>
<td>Reproducible</td><td>$form_reproducible</td>
</tr><tr>
<td>Priority</td><td>$form_priority</td>
</tr>
</table>
EOL;

// Send the email
sendMail($form_username, $form_password, $form_username.SMTP_ACCOUNT, $form_email, $form_name, $content, $file );

//save file
saveAsFile($content, $file);

//response
setStatus("ok");

/*----------------------------------------*/

function sendMail( $username, $password, $to, $from, $name, $htmlContent, $file )
{
    // Create the SMTP configuration
    $transport = Swift_SmtpTransport::newInstance( SMTP_HOST, SMTP_PORT, SMTP_TRANSPORT );
    $transport->setUsername( $username.SMTP_ACCOUNT );
    $transport->setPassword( $password );

    // Create the message
    $message = Swift_Message::newInstance();
    $message->setFrom( $from, $name );
    $message->setTo( $to );
    $message->setSubject("Bug report");
    $message->setBody( $htmlContent, 'text/html' );
    $message->addPart('To view the message, please use an HTML compatible email viewer!', 'text/plain');
    
    $message->attach(Swift_Attachment::fromPath( $file['tmp_name'], $file['type'] )->setFilename( $file['tmp_name'] ) );
    
    // send the message
    $mailer = Swift_Mailer::newInstance($transport);
    if( !$mailer->send( $message ) )
    {
        setStatus("unknown");
    }
}

function saveAsFile( $content, $file )
{
    $filedate = date("Ymd_His");
    $uploaddir = "/var/www/uploads/$filedate/";
    mkdir($uploaddir, 0644);
    
    $myFile = $uploaddir . "ticketfile.html";
    $attachement = $uploaddir . $file['name'];
    $fh = fopen( $myFile, 'w') or setStatus("unknown");
    
    $image = '<img src="'.$file['name'].'">';
    
    fwrite( $fh, $content.$image );
    fclose( $fh );

    move_uploaded_file( $file['tmp_name'], $attachement ) or setStatus("unknown");
}
 
/*----------------------------------------*/

function setStatus($error){
    header("Location: index.php?status=$error");
    exit();
}

?>