<?php

namespace App\Services;

// importer php mailer
use PHPMailer\PHPMailer\PHPMailer;
class EmailService
{
    //
    protected $app_name ;
    protected $host ;
    protected $port ;
    protected $username ;
    protected $password ;


    // constructeur
     function __construct()
     {
        $this->app_name = config('app.name');
        $this->host = config('app.mail_host');
        $this->port = config('app.mail_port');
        $this->username = config('app.mail_username');
        $this->password = config('app.mail_password');
     }

    //  fonction pour envoyer le mail (infos du user)

    public function sendEmail($subject, $emailUser, $name, $isHtml, $activation_code, $activation_token ){
        $mail = new PHPMailer;
        $mail->isSMTP(); // envoi du mail en usant le serveur smtp
        $mail->SMTPDebug = 0;
        $mail->Host = $this->host;
        $mail->Port = $this->port;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->SMTPAuth = true; //auth du user
        $mail->Subject= $subject;
        $mail->setFrom($this->app_name, $this->app_name);
        $mail->addReplyTo($this->app_name, $this->app_name);//possib de reponse
        $mail->addAddress($emailUser, $name);
        $mail->isHTML($isHtml);
        $mail->Body = $this->viewSendMail($name, $activation_code, $activation_token );
        $mail->send();

    }

    public function resetPassword($subject, $emailUser, $name, $isHtml, $activation_token){
        $mail = new PHPMailer;
        $mail->isSMTP(); // envoi du mail en usant le serveur smtp
        $mail->SMTPDebug = 0;
        $mail->Host = $this->host;
        $mail->Port = $this->port;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->SMTPAuth = true; //auth du user
        $mail->Subject= $subject;
        $mail->setFrom($this->app_name, $this->app_name);
        $mail->addReplyTo($this->app_name, $this->app_name);//possib de reponse
        $mail->addAddress($emailUser, $name);
        $mail->isHTML($isHtml);
        $mail->Body = $this->viewResetPassword($name, $activation_token );
        $mail->send();
    }

    public function viewSendMail($name, $activation_code, $activation_token){
        return view('mail.confirmation_email') ->with([
            'name' => $name,
            'activation_code' => $activation_code,
            'activation_token' => $activation_token,
        ]);
    }

    public function viewResetPassword($name, $activation_token){
        return view('mail.reset_password') ->with([
            'name' => $name,
            'activation_token' => $activation_token,
        ]);
}

}
