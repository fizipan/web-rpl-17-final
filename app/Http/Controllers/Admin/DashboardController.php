<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ebook;
use App\Models\Project;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::count();
        $tutorials = Tutorial::count();
        $projects = Project::count();

        $ebook = Ebook::with('user')->latest()->take(1)->get();
        $tutorial = Tutorial::with('user')->latest()->take(1)->get();
        $project = Project::with('user')->latest()->take(1)->get();
        return view('pages.admin.dashboard', [
            'ebooks' => $ebooks,
            'tutorials' => $tutorials,
            'projects' => $projects,
            'ebook' => $ebook,
            'tutorial' => $tutorial,
            'project' => $project,
        ]);
    }
}
