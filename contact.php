<?php

$response = array();
$response['status'] = "danger";

if($_POST['help_name'] != "" && $_POST['help_email'] != "" && $_POST['help_subject'] != "" && $_POST['help_text'] != "") {
    $to = "your@email.com"; // Your email
    $subject = 'New question!'; // E-mail subject
    $message = '
            <html>
                <head>
                    <title>'.$subject.'</title>
                </head>
                <body>
                    <p>Name: '.$_POST['help_name'].'</p>
                    <p>E-mail: '.$_POST['help_email'].'</p>
                    <p>Subject: '.$_POST['help_subject'].'</p>
                    <p>Text: '.$_POST['help_text'].'</p>
                </body>
            </html>';
    $headers  = "Content-type: text/html; charset=utf-8 \r\n"; // Charset
    $headers .= "From: Your Company Name <your@email.com>\r\n"; // Your name and email

    if(mail($to, $subject, $message, $headers)) {
        $response['status'] = "success";
    } else {
        $response['status'] = "danger";
    }
}

echo json_encode($response);

?>