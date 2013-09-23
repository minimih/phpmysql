<?php 
    $form_email = $_POST['email'];
    $form_subject = $_POST['subject'];
    $form_message = $_POST['message'];
    
    //MAIL HEADERS
    $to = $form_email;
    $subject = $form_subject;
    
    $headers = "From: <hoehnmic@students.zhaw.ch>\r\n";
    $headers .= "Reply-To: Michael Hoehn <hoehnmic@students.zhaw.ch>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    //MAIL TEXT
    $message = $form_message;
    
    //SEND MAIL
    mail($to, $subject, $message, $headers);
        
    //call success page
    header("Location:../mail_success.php");
?>