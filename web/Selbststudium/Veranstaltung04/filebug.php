<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once('config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/swift/swift_required.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/recaptchalib.php');

$privatekey = "6LfZH-gSAAAAACBjnvDg8VEzYkY-j0LVC2IaKavM";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    header('Location: index.php?status=captchaerror');
    exit();
} else {
    //Your code here to handle a successful verification
    
    // Suppress DateTime warnings
    date_default_timezone_set(@date_default_timezone_get());
    
    //set vars
    $form_username = htmlspecialchars($_POST['username']);
    $form_password = htmlspecialchars($_POST['password']);
    $form_email = htmlspecialchars($_POST['email']);

    echo "Parameters:<br/>";
    echo "To: $form_email <br/>";
    echo createBody();
    
    // Create the SMTP configuration
    $transport = Swift_SmtpTransport::newInstance(SMTP_HOST, SMTP_PORT, SMTP_TRANSPORT);
    $transport -> setUsername($form_username.SMTP_ACCOUNT);
    $transport -> setPassword($form_password);
    
    // Create the message
    $message = Swift_Message::newInstance();
    $message -> setTo($form_email);
    
    $message -> setSubject("Bug report");
    $message -> setBody(createBody());
    $message -> setFrom($form_username.SMTP_ACCOUNT, "Michael Hoehn");
    
    $file = $_FILES['upload']['tmp_name'];
    
    if(!isset($file)){
        header('Location: index.php?status=fileerror');
        exit();
    }
    
    $message -> attach(Swift_Attachment::fromPath($file, 'image/jpeg')->setFilename('attachement.jpg'));
    
    // Send the email
    echo "Sending mail...";
    $mailer = Swift_Mailer::newInstance($transport);
    if ($mailer -> send($message)) {
        echo " Succeeded<br/>";
    } else {
        echo " Failed<br/>";
    }
    
    //fileupload
    //funktioniert noch nicht.
    /*
    $uploaddir = '/uploads/';
    $uploadfile = $uploaddir.$_FILES['upload']['name'];
        
    //move file to upload folder
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)) {
        print "upload ok";
    } else {
        print "upload failed";        
    }
    */
    
    //response
    header('Location: index.php?status=ok');
    exit();
}

//set email body
function createBody() {
    $form_name = htmlspecialchars($_POST['name']);
    $form_website = htmlspecialchars($_POST['website']);
    
    $form_tel = htmlspecialchars($_POST['tel']);
    $form_callback = isset($_POST['callback']) ? htmlspecialchars($_POST['callback']) : "No";
    
    $form_bugtype = htmlspecialchars($_POST['bugtype']);
    $form_priority = htmlspecialchars($_POST['priority']);
    $form_reproducible = htmlspecialchars($_POST['reproducible']);
    
    $form_date = htmlspecialchars($_POST['date']);
    
    $form_description = htmlspecialchars($_POST['description']);

    return "Name: $form_name
        Website: $form_website
        Telephone: $form_tel
        Callback required: $form_callback
        Bugtype: $form_bugtype
        Priority: $form_priority
        Reproducible: $form_reproducible
        Date: $form_date
        Description: $form_description
    ";
}
?>