<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $email = $input['email'];
        // generation du token pour l'activation du compte avant enregistrement
        $activation_token = md5(uniqid()).$email.sha1($email);

        $activation_code = "";
        $length_code = 6;
        for ($i=0; $i < $length_code ; $i++) {
            # code...
            $activation_code .= mt_rand(0,9);
        }

        Validator::make($input, [
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

            $name = $input['prenom'] . ' ' . $input['nom'];

            // instanciation de la classe EmailService
            $emailSend = new EmailService;
            $subject = "Activate your account";

            $emailSend -> sendEmail($subject, $email, $name, true, $activation_code, $activation_token);



        return User::create([
            'prenom' => $input['prenom'],
            'nom' => $input['nom'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'activation_code' => $activation_code,
            'activation_token' => $activation_token,
        ]);
    }
}
