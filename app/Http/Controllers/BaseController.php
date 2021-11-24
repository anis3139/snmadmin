<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public $user;
    protected $enumStatuses = [
         'inactive', 'active', 'pending', 'freez', 'block',
    ];

    protected $blogEnumStaus = [
        'Inactive', 'Active'
    ];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function successResponse($result, $message, $responseCode)
    {
		//dd($result);
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, $responseCode);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function errorResponse($error, $errorMessages = [], $code = 404)
    {
        try {
            $response = [
                'success' => false,
                'message' => $error,
            ];


            if(!empty($errorMessages)){
                $response['data'] = $errorMessages;
            }


            return response()->json($response, $code);
        } catch (\Throwable $th) {
            return response()->json( $th->getMessage());
        }
    }
}
