<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreOtpRequest;
use App\Jobs\UserRegistrationJobs;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController
{

    public function sendOtp(StoreOtpRequest $request)
    {

        $randomNumber = rand(1000, 9999);
        $result = Otp::where('phone', $request->phone)
        ->orWhere('email', $request->phone)
        ->first();
        $result->otp=$randomNumber;
        $result->save();
        
        $user =User::where('phone', $request->phone)
        ->orWhere('email', $request->phone)
        ->first();
        if($user){
            dispatch(new UserRegistrationJobs($user, $randomNumber));
            return $this->successResponse($result, 'Otp send Successfully', Response::HTTP_CREATED);
        }else{
            return $this->errorResponse('error', 'User Does not exist', Response::HTTP_UNPROCESSABLE_ENTITY);
        }


    }


    public function login(LoginRequest $request)
    {
        $verifyOtp =$this->verify($request->otp);
        if($verifyOtp == false){
            return $this->errorResponse('error', 'Wrong Otp', Response::HTTP_UNPROCESSABLE_ENTITY);
        }else if($verifyOtp=='Otp Expired'){
            return $this->errorResponse('error', 'Otp expired', Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            $user = User::where('email', $verifyOtp->email)->orWhere('phone', $verifyOtp->phone)->first();
            if (!$user) {
                return $this->errorResponse('error', 'User Does not exist', Response::HTTP_UNPROCESSABLE_ENTITY);
            }else{
                Auth::loginUsingId($user->id, TRUE);
                $data['token'] = $user->createToken($user)->accessToken;
                $data['user']=Auth::user();
                return $this->successResponse($data, 'User Updated', Response::HTTP_CREATED);

            }
        }

    }


    protected function verify($otp){
        $userfind = Otp::where('otp', $otp)->first();
        if($userfind){
            $updated_at = $userfind->updated_at;
            $current_time = Carbon::now();
            $startTime = Carbon::parse( $updated_at);
            $endTime = Carbon::parse($current_time);
            $minuteDifferance = $endTime->diffInMinutes($startTime);
            if ($minuteDifferance <= 2) {
                return  $userfind;
            }
            else{
                return 'Otp Expired';
            }
        }else{
            return false;
        }
    }


}
