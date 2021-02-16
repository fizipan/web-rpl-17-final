<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Price;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EbookRequest;
use App\Models\Ebook;
use Illuminate\Support\Facades\Auth;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebooks = Ebook::latest()->with('level', 'price', 'user')->paginate(12);
        return view('pages.admin.ebook.index', [
            'ebooks' => $ebooks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $prices = Price::all();
        return view('pages.admin.ebook.create', [
            'levels' => $levels,
            'prices' => $prices,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EbookRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/ebook', 'public');
        $data['users_id'] = Auth::user()->id;

        Ebook::create($data);

        session()->flash('success', "created");
        return redirect()->route('ebook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $levels = Level::all();
        $prices = Price::all();
        $ebooks = Ebook::with('price', 'level')->where('slug', $slug)->firstOrFail();
        return view('pages.admin.ebook.edit', [
            'ebooks' => $ebooks,
            'prices' => $prices,
            'levels' => $levels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'levels_id' => 'required|integer|exists:levels,id',
            'prices_id' => 'required|integer|exists:prices,id',
            'url' => 'required|string|min:5|max:255',
            'photo' => 'image',
        ]);

        $data['slug'] = Str::slug($request->name);

        $data['users_id'] = Auth::user()->id;

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('assets/ebook', 'public');
        } else {
            unset($data['photo']);
        }


        $ebook = Ebook::where('slug', $slug)->firstOrFail();

        $ebook->update($data);

        session()->flash('success', "updated");

        return redirect()->route('ebook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ebooks = Ebook::where('slug', $slug)->firstOrFail();

        $ebooks->delete();

        session()->flash('success', "deleted");
        return redirect()->route('ebook.index');
    }
}
