<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Issues;


class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }
    public function login(Request $request)
{
    if($request->email === null){
        $mail=User::where('name','=',$request->name)->pluck('email')->toArray();
        $password = $request->only( 'password');
        $keys = array('email');
        $email=array_fill_keys($keys,$mail[0]);
        $credentials=array_merge($email,$password);
    } else $credentials = $request->only('email', 'password');

    if (!$token = JWTAuth::attempt($credentials)  ) {
        return response([
            'status' => 'error',
            'error' => 'invalid.credentials',
            'msg' => 'Invalid Credentials.'
        ], 400);
    }
    return response([
        'status' => 'success',
        'token' => $token
    ]);
}
    public function user(Request $request)
    {
        $user = User::orderBy('id','asc')->with('issues')->get();
        return response()->json($user);
    }
    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);
        
        try {
            JWTAuth::invalidate($request->input('token'));
            return response([
            'status' => 'success',
            'msg' => 'You have successfully logged out.'
        ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response([
                'status' => 'error',
                'msg' => 'Failed to logout, please try again.'
            ]);
        }
    }
    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }


}
