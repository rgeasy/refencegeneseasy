<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use App\Models\PasswordResets;
use App\Models\User;

class ResetPasswordEMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = Str::random(12);
        $url = config('app.url');

        $password_resets = new PasswordResets();
        $password_resets->token = $token;
        $password_resets->email = $this->email;
        $password_resets->save();
        $user = User::where('email', $this->email)->first();

        $this->url = $url."/password/".$user->id."/".$token."/reset";

        return $this->markdown('mail.ResetPasswordEMail')
                    ->subject("Resetar a Senha")
                    ->with([
                        'email' => $password_resets->email,
                        'url' => $this->url
                    ]);
    }
}