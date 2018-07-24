<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
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

    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param  User  $user
     * @return void
     */
    public function handle()
    {
        // Send email welcome user
        Mail::to($this->user->email)
                ->send(new WelcomeEmail($this->user));
    }
}
