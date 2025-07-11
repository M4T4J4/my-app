<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Services\EmailSercice;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
        /*Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();*/

        $email = $input['email'];

        //generate token for activation the account user
        $activation_token = md5(uniqid()) . $email . sha1($email);

        //generate code for activation the account user
        $activation_code = "";
        $length_code = 5;

        for($i = 0; $i < $length_code; $i++){
            $activation_code .= mt_rand(0,9);
        }

        $name = $input['firstname'] .' '. $input['lastname'] ;

        $emailSend = new EmailSercice();

        $subject = "Activate Your Account";
        $message = "Hi" . $name . "please activate your account.Copy and paste your activation code !" . $activation_code
                    ."or click to the link to activate your account". $activation_token;
        $emailSend->sendEmail($subject, $email, $name, false, $message);  



        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($input['password']),
            'activation_code' => $activation_code,
            'activation_token' => $activation_token,
        ]);
    }
}
