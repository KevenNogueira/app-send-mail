<?php
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
            return false;
        }
        return true;
    }

    public function gravaMensagem()
    {

        $para = $this->__get('para');
        $assunto = $this->__get('assunto');
        $mensagem = $this->__get('mensagem');

        $email = $para . '|' . $assunto . '|' . $mensagem . PHP_EOL;

        $arquivoEmail = fopen('D:\Downloads\Programacao\XAMPP\XAMPP\htdocs\WorkSpace\PHP Orientado a Objeto\App Send Email\Emails\email.txt', 'a');

        fwrite($arquivoEmail, $email);
        fclose($arquivoEmail);
    }
}

$mensagemEmail = new Email($_POST['para'], $_POST['assunto'], $_POST['mensagem']);

if ($mensagemEmail->validaMensagem()) {
    $mensagemEmail->gravaMensagem();
    header('Location: Index.php');
} else {
    header('Location: Index.php?erro=campoVazio');
}