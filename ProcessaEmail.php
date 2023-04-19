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
        if (empty($this->assunto) || empty($this->mensagem)) {
            return false;
        }
        return true;
    }
}

$mensagemEmail = new Email($_POST['para'], $_POST['assunto'], $_POST['mensagem']);

if ($mensagemEmail->validaMensagem()) {
    header('Location: Index.php');
} else {
    header('Location: Index.php?erro=campoVazio');
}
