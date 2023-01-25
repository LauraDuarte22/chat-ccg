<?php

namespace App\Http\Controllers;

use App\Models\CampaignUser;
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

        $campaignUser=CampaignUser::create([
            'user_id' => $user['id'],
            'campaing_id' => $campaing['id']
        ]);
        return response([
            'campaing' => $campaing,
            'user' => $user,
            
        ]);
    }

    public function getCampaing(Request $request){

        $campaing = Campaing::query()->select('name')->get();
       
        return [
            "campaings" => $campaing,
        ];
    }
}
