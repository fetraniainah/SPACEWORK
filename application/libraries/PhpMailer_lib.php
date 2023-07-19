<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class PHPMailer_Lib{
    public function __construct(){
        log_message('Debug','PHP MAILER CLASS IS LOADED');
    }

    public function load(){
        require_once APPPATH.'third_party/Mailer/src/Exception.php';
        require_once APPPATH.'third_party/Mailer/src/PHPMailer.php';
        require_once APPPATH.'third_party/Mailer/src/SMTP.php';
        $mail = new PHPMailer;
        return new $mail;
    }

}