<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once($_SERVER['DOCUMENT_ROOT'].'/lib/recaptchalib.php');
$privatekey = "6LfZH-gSAAAAACBjnvDg8VEzYkY-j0LVC2IaKavM";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    header("Location:index.php");    
} else {
    // Your code here to handle a successful verification
}


?>