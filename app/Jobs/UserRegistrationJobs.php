<?php

namespace App\Jobs;

use App\Models\Admin;
use App\Models\User;
use App\Notifications\UserRegistrationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserRegistrationJobs implements ShouldQueue
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
        $admins=Admin::with("roles")->whereHas("roles", function($q) {
            $q->where("name", "!=", "user");
        })->get();


        foreach ($admins as $admin) {
            $admin->notify(new UserRegistrationNotification($this->user, $this->otp));
        }



    }
}
