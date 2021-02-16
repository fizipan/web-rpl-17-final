<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Project;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function project()
    {
        $searchProject = request('project');

        $projects = Project::where('name', 'like', "%$searchProject%")->with('user')->latest()->paginate(12);
        return view('pages.project', [
            'projects' => $projects,
        ]);
    }

    public function tutorial()
    {
        $searchTutorial = request('tutorial');

        $tutorialsPemula = Tutorial::where('levels_id', 1)->with('user', 'level')->latest()->paginate(12);
        $tutorialsMenengah = Tutorial::where('levels_id', 2)->with('user', 'level')->latest()->paginate(12);
        $tutorialsAll = Tutorial::where('levels_id', 3)->with('user', 'level')->latest()->paginate(12);
        $tutorials = Tutorial::where('name', 'like', "%$searchTutorial%")->with('user', 'level')->latest()->paginate(12);
        return view('pages.tutorial', [
            'tutorials' => $tutorials,
            'tutorialsPemula' => $tutorialsPemula,
            'tutorialsMenengah' => $tutorialsMenengah,
            'tutorialsAll' => $tutorialsAll,
        ]);
    }

    public function ebook()
    {
        $searchebook = request('ebook');

        $ebooksPemula = Ebook::where('levels_id', 1)->with('level', 'price')->latest()->paginate(12);
        $ebooksMenengah = Ebook::where('levels_id', 2)->with('level', 'price')->latest()->paginate(12);
        $ebooksAll = Ebook::where('levels_id', 3)->with('level', 'price')->latest()->paginate(12);
        $ebooks = Ebook::where('name', 'like', "%$searchebook%")->with('level', 'price')->latest()->paginate(12);
        return view('pages.ebook', [
            'ebooks' => $ebooks,
            'ebooksPemula' => $ebooksPemula,
            'ebooksMenengah' => $ebooksMenengah,
            'ebooksAll' => $ebooksAll,
        ]);
    }
}
