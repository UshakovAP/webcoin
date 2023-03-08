<?php

$response = array();
$response['status'] = "danger";

if($_POST['whitelist_email'] != "") {
    $to = "your@email.com"; // Your email
    $subject = 'New whitelister!'; // E-mail subject
    $message = '
            <html>
                <head>
                    <title>'.$subject.'</title>
                </head>
                <body>
                    <p>E-mail: '.$_POST['whitelist_email'].'</p>
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