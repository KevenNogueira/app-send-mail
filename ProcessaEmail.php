<?php

require "./Libs/PHPMailer/Exception.php";
require "./Libs/PHPMailer/OAuth.php";
require "./Libs/PHPMailer/PHPMailer.php";
require "./Libs/PHPMailer/POP3.php";
require "./Libs/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $para = null;
    private $assunto = null;
    private $mensagem = null;

    public function __construct($para, $assunto, $mensagem)
    {
        $this->para = $para;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
    }

    public function __set($attr, $valor)
    {
        $this->$attr = $valor;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function validaMensagem()
    {
        if (empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
            return true;
        }
        return false;
    }
}

$mensagemEmail = new Email($_POST['para'], $_POST['assunto'], $_POST['mensagem']);

if ($mensagemEmail->validaMensagem()) {
    echo 'Mensagem não e valida!';
    die();
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kevennog686@gmail.com';                     //SMTP username
    $mail->Password   = 'zjgngjbbgxhbmzlw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('kevennog686@gmail.com', 'Keven Nogueira');
    $mail->addAddress($mensagemEmail->__get('para'));     //Add a recipient
    //    $mail->addReplyTo('info@example.com', 'Information');
    //    $mail->addCC('cc@example.com');
    //    $mail->addBCC('bcc@example.com');

    //Attachments
    //    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagemEmail->__get('assunto');
    $mail->Body    = $mensagemEmail->__get('mensagem');

    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Não foi possivel enviar o e-mail no momento! Favor tentar mais tarde </br>";
    echo 'Detalhes do erro: {$mail->ErrorInfo}';
}
