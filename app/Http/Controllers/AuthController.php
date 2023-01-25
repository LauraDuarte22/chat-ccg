<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CampaignUser;
use App\Models\Campaing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'profile' => 'required|string',
            'password' => 'required|string',
            'campaing' => 'required|string'
        ]);

        /** @var \App\Models\User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'profile' => $data['profile'],
            'status' => false,
            'password' => bcrypt($data['password']),

        ]);
        $token = $user->createToken('main')->plainTextToken;
        $campaing = $data['campaing'];
        $campaingId = Campaing::query()->select('id')->where('name','=',$campaing)->get();
       $CampaignUser= CampaignUser::create([
            'user_id' =>  $user['id'],
            'campaing_id'=>$campaingId[0]['id'],
           
        ]);

        return response([
            'user' =>$user,
           'token' => $token,
            'campaing'=> $campaing 
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => [
                'required',
            ],
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);
        User::where('email', $credentials['email'])
            ->update([
                'status' => true
            ]);

        if (!Auth::attempt($credentials, $remember)) {
            return response([
                'error' => 'The Provided credentials are not correct'
            ], 422);
        }
        $user = Auth::user();


        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }
    public function logout()
    {
        /** @var User $user */
        $user = Auth::user();
        // Elimina el token la sesión actual
        $user->currentAccessToken()->delete();

        return response([
            'success' => true
        ]);
    }
}
