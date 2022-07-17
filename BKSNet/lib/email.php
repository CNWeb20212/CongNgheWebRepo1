<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

class email{
    public $mail;
    public $username, $password;

    public function __construct($username = "bksnet20222@gmail.com", $password = "npygeryczxwrwchn"){
        $this->username = $username;
        $this->password = $password;

        $this->mail = new PHPMailer();
        $this->mail->IsSMTP();

        $this->mail->SMTPDebug  = 0;  
        $this->mail->SMTPAuth   = TRUE;
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port       = 587;
        $this->mail->Host       = "smtp.gmail.com";
        // $this->mail->Host       = "smtp.mail.yahoo.com";
        $this->mail->Username   = $this->username;
        $this->mail->Password   = $this->password;    
    }

    public function send($receiver, $subject, $body){

        $this->mail->IsHTML(true);
        $this->mail->AddAddress($receiver, "receiver");
        $this->mail->SetFrom($this->username, "BKSNet");
        //$this->mail->AddReplyTo("reply-to-email", "reply-to-name");
        //$this->mail->AddCC("cc-recipient-email", "cc-recipient-name");

        $this->mail->Subject = $subject;
        $content = $body;

        $this->mail->MsgHTML($content); 
        if(!$this->mail->Send()) {
//             echo "Error while sending Email.";
            // var_dump($this->mail);
            return false;
        } else {
//             echo "Email sent successfully";
            return true;
        }
    }

}

?>
