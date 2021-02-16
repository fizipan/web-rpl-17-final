<?php

namespace App\Http\Controllers\User;

use App\Models\Project;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userAuth = Auth::user();
        $tutorial = Tutorial::where('users_id', $userAuth->id)->count();
        $tutorials = Tutorial::with('user')->where('users_id', $userAuth->id)->latest()->take(1)->get();
        $project = Project::where('users_id', $userAuth->id)->count();
        $projects = Project::with('user')->latest()->where('users_id', $userAuth->id)->take(2)->get();
        $total = $tutorial + $project;
        return view('pages.user.dashboard', [
            'tutorials' => $tutorials,
            'tutorial' => $tutorial,
            'project' => $project,
            'projects' => $projects,
            'total' => $total,
        ]);
    }
}
