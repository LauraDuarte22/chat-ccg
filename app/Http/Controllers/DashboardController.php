<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $agents = User::query()->where('type','=', 'Agente')->count();
        return [
            "totalAgents" => $agents
        ];
    
    }
    
}
