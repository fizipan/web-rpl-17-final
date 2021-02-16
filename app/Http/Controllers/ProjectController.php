<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('user')->latest()->paginate(12);
        return view('pages.project', [
            'projects' => $projects,
        ]);
    }
}
