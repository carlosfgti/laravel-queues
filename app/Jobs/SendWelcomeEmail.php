<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
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
        Mail::to($user->email)
                ->send(new WelcomeEmail($user));
    }
}
