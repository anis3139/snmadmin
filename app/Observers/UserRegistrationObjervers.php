<?php

namespace App\Observers;

use App\Jobs\UserRegistrationJobs;
use App\Models\Otp;
use App\Models\User;

class UserRegistrationObjervers
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {

        $randomNumber = rand(1000, 9999);
        $result = Otp::updateOrCreate(
            [
                'phone' => $user->phone,
            ],
            [
                'user_id' =>$user->id,
                'mobile' =>$user->phone,
                'email' =>$user->email,
                'otp' => $randomNumber,
            ]
        );
        if($result){
            dispatch(new UserRegistrationJobs($user, $result->otp));
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
