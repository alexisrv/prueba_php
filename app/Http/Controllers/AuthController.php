<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use \stdClass;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token',$request->email)->plainTextToken;
        \LogActivity::addToLog('New registered user');
        return response()
            ->json([
                'status' => true,
                'data' => $user, 
                'access_token' => $token, 
                'token_type' => 'Bearer',
            ]);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            \LogActivity::addToLog('Unauthorized login');
            return response()->json(['status' => false,'message' => 'Unauthorized login'], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token',$request['email'])->plainTextToken;
        \LogActivity::addToLog('Login: '.$user->name);
        return response()
            ->json([
                'status' => true,
                'message' => 'Hi '.$user->name,
                'accessToken' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        \LogActivity::addToLog('You have successfully logged out and the token was successfully deleted');
        
        return response()
            ->json([
                'status' => true,
                'message' => 'You have successfully logged out and the token was successfully deleted'
            ]);
    }

}
