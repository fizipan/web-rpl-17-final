<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::latest()->with('user')->paginate(12);
        return view('pages.admin.project.index', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.project.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/project', 'public');
        $data['users_id'] = Auth::user()->id;

        Project::create($data);

        session()->flash('success', "created");
        return redirect()->route('project.index');
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
        $projects = Project::where('slug', $slug)->firstOrFail();
        return view('pages.admin.project.edit', [
            'projects' => $projects,
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
            'url' => 'required|string|min:5|max:255',
            'photo' => 'image',
        ]);

        $data['slug'] = Str::slug($request->name);

        $data['users_id'] = Auth::user()->id;

        if ($request->file('photo')) {
            $data['photo'] = $request->file('photo')->store('assets/project', 'public');
        } else {
            unset($data['photo']);
        }


        $project = Project::where('slug', $slug)->firstOrFail();

        $project->update($data);

        session()->flash('success', "updated");

        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $projects = Project::where('slug', $slug)->firstOrFail();

        $projects->delete();

        session()->flash('success', "deleted");
        return redirect()->route('project.index');
    }
}
