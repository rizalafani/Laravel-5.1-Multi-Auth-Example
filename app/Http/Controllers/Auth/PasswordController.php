<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function send_reset_link($email)
    {
        return Password::user()->sendResetLink($email, function (Message $message) {
            $message
                ->from('rizal@lmultiauth.com', 'Laravel Multi Auth Mail Test')
                ->subject($this->getEmailSubject());
        });
    }

    protected function reset_process($credentials)
    {
        return Password::user()->reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
            Auth::user()->login($user);
        });
    }
}
