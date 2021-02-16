<?php

namespace App\Http\Controllers\User;

use App\Models\Level;
use App\Models\Tutorial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\TutorialRequest;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAuth = Auth::user();
        $tutorials = Tutorial::latest()->where('users_id', $userAuth->id)->with('level', 'user')->paginate(12);
        return view('pages.user.tutorial.index', [
            'tutorials' => $tutorials,
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
        return view('pages.user.tutorial.create', [
            'levels' => $levels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TutorialRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/tutorial', 'public');
        $data['users_id'] = Auth::user()->id;

        Tutorial::create($data);

        session()->flash('success', "created");
        return redirect()->route('tutorials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $tutorials = Tutorial::with('level')->where('slug', $slug)->firstOrFail();
        return view('pages.user.tutorial.edit', [
            'tutorials' => $tutorials,
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
            'url' => 'required|string|min:5|max:255',
            'photo' => 'image',
        ]);

        $data['slug'] = Str::slug($request->name);

        $data['users_id'] = Auth::user()->id;

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('assets/tutorial', 'public');
        } else {
            unset($data['photo']);
        }


        $tutorial = Tutorial::where('slug', $slug)->firstOrFail();

        $tutorial->update($data);

        session()->flash('success', "updated");

        return redirect()->route('tutorials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $tutorials = Tutorial::where('slug', $slug)->firstOrFail();

        $tutorials->delete();

        session()->flash('success', "deleted");
        return redirect()->route('tutorials.index');
    }
}
