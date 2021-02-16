<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorialsPemula = Tutorial::where('levels_id', 1)->with('user', 'level')->latest()->paginate(12);
        $tutorialsMenengah = Tutorial::where('levels_id', 2)->with('user', 'level')->latest()->paginate(12);
        $tutorialsAll = Tutorial::where('levels_id', 3)->with('user', 'level')->latest()->paginate(12);
        $tutorials = Tutorial::with('user', 'level')->latest()->paginate(12);
        return view('pages.tutorial', [
            'tutorials' => $tutorials,
            'tutorialsPemula' => $tutorialsPemula,
            'tutorialsMenengah' => $tutorialsMenengah,
            'tutorialsAll' => $tutorialsAll,
        ]);
    }
}
