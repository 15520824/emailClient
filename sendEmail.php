<?php
    use PHPMailer\PHPMailer\PHPMailer;
    $emailSend = "15520824@tienphongnam.vn";
    $password = "hokbit1A";
    $name = 'SoftAView';

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = "mail.50webs.com";
        $mail->SMTPAuth = true;
        $mail->Username = $emailSend;
        $mail->Password =  $password;
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($emailSend, $name);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>
