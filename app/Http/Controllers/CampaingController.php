<?php

namespace App\Http\Controllers;

use App\Models\Campaing;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;


class CampaingController extends Controller
{
    public function createCampaing(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|unique:campaings,name',
        ]);
        $campaing = Campaing::create([
            'name' => $data['name'],
            'status' => 1
        ]);
        $userFields = [
            'name' => "Admin " . $campaing['name'],
            'email' => "Admin@" .  $campaing['name'],
            'password' => "Admin" . $campaing['name'],
            'profile' => 'Administrador'
        ];
        $user = User::create([
            'name' => $userFields['name'],
            'email' => $userFields['email'],
            'profile' => $userFields['profile'],
            'status' => false,
            'password' => bcrypt($userFields['password']),

        ]);
        $token = $user->createToken('main')->plainTextToken;

        return response([
            'campaing' => $campaing,
            'user'=>$user
        ]);
    }
}
