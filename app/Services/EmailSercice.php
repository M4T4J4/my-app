<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;


class EmailSercice
{
    protected $name;
    protected $username;
    protected $password;
    protected $port;
    protected $host ;

    function __construct()
    {
        $this->name = config('app.name');
        $this->username = config('app.mail_username');
        $this->password = config('app.mail_password');
        $this->port = config('app.mail_port');
        $this->host = config('app.mail_host');
    }

    public function sendEmail($subject, $emailUser, $nameUser, $isHtml, $message)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = $this->host;
        $mail->Port = $this->port;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->SMTPAuth = true;
        $mail->CharSet = 'utf-8';
        $mail->Subject = $subject;
        $mail->setFrom($this->name, $this->name);
        $mail->addReplyTo($this->name, $this->name);
        $mail->addAddress($emailUser,$nameUser);
        $mail->isHTML($isHtml);
        $mail->Body = $message;
        $mail->send();

    }
}