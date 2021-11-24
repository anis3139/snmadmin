<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreOtpRequest;
use App\Jobs\UserRegistrationJobs;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends BaseController
{

    public function verify(StoreOtpRequest $request)
    {

        $randomNumber = rand(1000, 9999);
        $result = Otp::where('phone', $request->phone)->first();
        $result->otp=$randomNumber;
        $result->save();
        $user =User::where('phone', $request->phone)->first();
        if($user){
            dispatch(new UserRegistrationJobs($user, $randomNumber));
        }

        return response()->json(
            [
                'error' => 0,
                'message' => '',
                'data' => $result,
            ]
        );

        // $mytime = Carbon::now();
        // $otpchecking = Otp::where('phone', $request->phone)->whereDate('created_at',$mytime)->first();
        // dd( $otpchecking->created_at);

        // if($otpchecking <= 4) {
        //     return response()->json(
        //         [
        //             'error' => 0,
        //             'message' => '',
        //             'data' => null
        //         ]
        //     );
        // }


    }
    public function login(LoginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'otp' => $request->otp])) {
            $user = User::where('email', $request->email)->first();
            if ($user->two_factor_verified_at === null && $user->two_factor_code != null) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Verify your email first.',
                    'verify_link' => route('user.verify')]);
            }
            $accessToken = $user->createToken('authToken', ['user'])->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'Login success',
                'access_token' => $accessToken,
                'userData' => Auth::guard('user')->user(),
            ], Response::HTTP_ACCEPTED);
        }

        return response()->json(['success' => false, 'errors' => 'token incorrect'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
