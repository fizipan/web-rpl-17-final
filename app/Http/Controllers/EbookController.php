<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Level;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index()
    {
        $ebooksPemula = Ebook::where('levels_id', 1)->with('level', 'price')->latest()->paginate(12);
        $ebooksMenengah = Ebook::where('levels_id', 2)->with('level', 'price')->latest()->paginate(12);
        $ebooksAll = Ebook::where('levels_id', 3)->with('level', 'price')->latest()->paginate(12);
        $ebooks = Ebook::with('level', 'price')->latest()->paginate(12);
        return view('pages.ebook', [
            'ebooks' => $ebooks,
            'ebooksPemula' => $ebooksPemula,
            'ebooksMenengah' => $ebooksMenengah,
            'ebooksAll' => $ebooksAll,
        ]);
    }
}
