<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
    
        $tasks = Task::all();
        $user = Auth::user();
        
        return view('home', compact('tasks','user'));

    }
}
