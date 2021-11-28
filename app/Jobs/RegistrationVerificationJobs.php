<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\RegistrationOtpVerificationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RegistrationVerificationJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $user;
    private $otp;
    public function __construct(User $user, $otp)
    {
        $this->user=$user;
        $this->otp=$otp;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new RegistrationOtpVerificationNotification($this->user, $this->otp));
    }
}
