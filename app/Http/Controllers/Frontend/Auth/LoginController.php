<?php

namespace App\Http\Controllers\Frontend\Auth;
 
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request; 
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\StoreOtpRequest; 
use App\Http\Requests\LoginRequest;
use App\Jobs\UserRegistrationJobs;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.auth.register', [
            'prefixname' => 'user',
            'title' => 'User Registration',
            'page_title' => 'User Registration', 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request, User $user)
    {
        $data['user']= $user->create($request->only('name', 'email','username','phone'));
        return redirect()->route('client.login')->with('success','OTP send to your Mail or Mobile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            return redirect()->route('client.login')->with('success', 'Otp send Successfully');
        }else{
            return redirect()->back()->with('error', 'User Does not exist');
        }


    }


    public function login(LoginRequest $request)
    {
        $verifyOtp =$this->verify($request->otp);
        if($verifyOtp == false){
            return redirect()->back()->with('error', 'Wrong Otp');
        }else if($verifyOtp=='Otp Expired'){
             return redirect()->back()->with('error', 'Otp expired');
        }else{
            $user = User::where('email', $verifyOtp->email)->orWhere('phone', $verifyOtp->phone)->first();
            if (!$user) {
                 return redirect()->back()->with('error', 'User Does not exist');
            }else{
                Auth::loginUsingId($user->id, TRUE); 
                $data['user']=Auth::user();
                return redirect()->route('client.dashboard')->with('success', 'User Updated' );

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
            if ($minuteDifferance <= 20) {
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
