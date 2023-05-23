<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();
        $data = $request->all();
        // $data = $request->validated();
        
        $newProject = new Project();
        
        $newProject->fill($data);
        $newProject->slug = Str::slug($data['title']);
        if(isset($data['image'])) {
            $newProject->image = Storage::put('uploads', $data['image']);
        }

        $newProject->save();

        return to_route('admin.projects.index')->with('message', $newProject->title.' was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $request->validated();
        $data = $request->all();

        $project->slug = Str::slug($data['title']);
        if(isset($data['image'])) {
            if($project->image) {
                Storage::delete($project->image);
            }
            $project->image = Storage::put('uploads', $data['image']);
        }
        $project->update($data);
        return to_route('admin.projects.index')->with('message', $project->title.' has been edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $deleted_title = $project->title;
        if($project->image) {
            Storage::delete($project->image);
        }

        $project->delete();

        return to_route('admin.projects.index')->with('message', $deleted_title.' was deleted successfully');
    }
}
