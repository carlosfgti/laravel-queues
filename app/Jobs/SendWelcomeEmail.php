<?php

namespace App\Jobs;

use Illuminate\Notifications\Messages\MailMessage;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @param  User  $user
     * @return void
     */
    public function handle(User $user)
    {
        // Send email welcome user
        return (new MailMessage)
            ->subject('Boas Vindas!')
            ->line('Seja bem vindo ao nosso projeto! =D')
            ->action('Acessar o Site', url(config('app.url')))
            ->line('É um prazer gigante lhe receber em nossa plataforma.');
    }
}
