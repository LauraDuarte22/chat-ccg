<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $agents = User::query()->where('profile','=', 'Agente')->count();
        $agentsConnected = User::query()->where('profile','=', 'Agente')->where('status','=','1')->count();
        return [
            "totalAgents" => $agents,
            "totalConnected"=>$agentsConnected,
            "totalDisconnected" =>$agents-$agentsConnected
        ];
    
    }
    
}
