<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\EmailService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
// message d'erreur si le user n'est pas connecte et veut reserever
   /* protected function authenticated(Request $request, $user)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('warning',
    'Your account has been activated');
    }

}*/

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    // verif si le user a deja activer son compte
    // ou pas avnt d'etre auth

    // fonction d'activation du code
    public function activationCode($token){
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return redirect()->route('login')->with('danger', 'This token does not match any user');
        }
        if ($this->request->isMethod('POST')) {
            $code = $user->activation_code;
            $activation_code = $this->request->input('activationcode');
            // comparaison code saisi par user et code send bd
            if ($activation_code != $code) {
                return back()->with([
                    'danger'=>'this activation code id inavlid !',
                    'activationcode' => $activation_code
                ]);
            }else {
                DB::table('users')->where('id', $user->id)->update([
                    'is_verified' => 1,
                    'activation_code' => '',
                    'activation_token' => '',
                    'email_verified_at' => new \DateTimeImmutable,
                    'updated_at' => new \DateTimeImmutable,

                ]) ;
                return redirect()->route('login')->with('success', 'Your account has been activated');
            }

        }
        return view('auth.activation', ['token' => $token]);
    }

    public function userChecker(){
        $activation_token = Auth::user()->activation_token;
        $is_verified = Auth::user()->is_verified;
        // verif de l'activation du c
        if ($is_verified != 1) {
            Auth::logout();
            return redirect()->route('activationCode-p', ['token' => $activation_token] )
                                -> with('warning', 'Your account is not activate,
                                please check your mail-box and activate your account
                                or ressend the confirmation messaye');
        } else {
            return redirect()->route('app-dashboard');
        }
    }

    // fonction renvoi email
    public function resendCode($token){
        $user = User::where('activation_token', $token)->first();
        $email = $user->email;
        $name = $user->name;
        $activation_token = $user->activation_token;
        $activation_code = $user->activation_code;

        // instanciation de la classe EmailService
        $emailSend = new EmailService;
        $subject = "Activate your account";

        $emailSend -> sendEmail($subject, $email, $name, true, $activation_code, $activation_token);

        return redirect()->route('activationCode-p',['token' => $token])->with('success', 'You have just resend the new activation code');
    }

    // fontion du lien de confirmation
    public function activationLink($token){
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->with('danger', 'This token does not match any user');
        }
        DB::table('users')->where('id', $user->id)->update([
            'is_verified' => 1,
            'activation_code' => '',
            'activation_token' => '',
            'email_verified_at' => new \DateTimeImmutable,
            'updated_at' => new \DateTimeImmutable,

        ]) ;
        return redirect()->route('login')->with('success', 'Your account has been activated');
    }

    // fonction de password oublier

    public function forgotPassword(){
        // verif si la requete est de type post
        if ($this->request->isMethod('post')) {
            $email = $this->request->input('email_send');
            // verif si l'email est dans la bd
            $user = DB::table('users')->where('email', $email)->first();
            if ($user) {
                $full_name = $user->nom . ' ' . $user->prenom;
                // generation du token pour la reinitialisation du mdp du user
                $activation_token = md5(uniqid()).$email.sha1($email);
                // instanciation de la classe emailreset
                $emailresetpwd = new EmailService;
                $subject = "Reinitialisation du password";
                $emailresetpwd -> resetPassword($subject, $email, $full_name, true, $activation_token);
                // envoie du token dans la base de donné
                DB::table('users')
                ->where('email', $email)
                ->update(['activation_token' => $activation_token]);
                $message = 'We have just sent the request to reset your password. Please check your email box';
                return back()->withErrors(['email_success' => $message])
                                ->with('old_email', $email)
                                ->with('success', $message) ;
            }else {
                $message = 'The email address is invalid !';
                return back()->withErrors([
                    'email_error' => $message])
                    ->with('old_email', $email)
                    ->with('danger', $message) ;
            }
        }
        return view('auth.forgot_password');
    }
    //

    public function changePassword($token){
        if ($this->request->isMethod('post')) {
            $new_password = $this->request->input('new-password');
            $new_password_confirm = $this->request->input('new-password-confirm');
            $passwordLength = strlen($new_password);
            $message = null;
            if ($passwordLength >= 8) {
                $message = 'Your passwords must be identical ';
                if ($new_password == $new_password_confirm) {
                    # code...
                    dd('ok');
                } else {
                    # code...
                    return back()->withErrors(['password_error_confirm' => $message])
                ->with('danger', $message)
                ->with('old-new-password-confirm', $new_password_confirm);
                }
            } else {
                $message = 'Your password must be at least 8 characters long';
                return back()->withErrors(['password_error' => $message])
                    ->with('danger', $message)
                    ->with('old-new-password', $new_password);

            }

        }

        return view('auth.change_password', ['activation_token' => $token]);
    }

    //On aura plus besoin des fonctions avec fortify
    /*public function login(){
        return view('auth.login');
    }
    public function sign(){
        return view('auth.sign');
    }*/
}
