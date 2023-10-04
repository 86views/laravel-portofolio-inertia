<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         
        $projects = ProjectResource::collection(Project::with('skill')->get());
        return  Inertia('Projects/Index', compact('projects'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        return  Inertia('Projects/Create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =   $request->validate([
            'name' => ['required', 'min:5'],
            'image' => ['required', 'image'],
            'skill_id' => ['required'],
            'project_url' => ['required'],
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
           $name = 'projects/' .uniqid() .  '.' . $file->extension();
           $file->storePubliclyAs('public', $name);
           $data['image'] = $name;
           
      }
      Project::create($data);
          return redirect()->route('projects.index')
          ->with('message', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $skills = Skill::all();
        return  Inertia('Projects/Edit', compact('skills', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $image = $project->image;
        
        $data =   $request->validate([
            'name' => ['required', 'min:5'],
            'skill_id' => ['required'],
            'project_url' => ['required'],
        ]);

        if($request->hasFile('image')) {
            Storage::delete($project->image);
            $file = $request->file('image');
           $name = 'projects/' .uniqid() .  '.' . $file->extension();
           $file->storePubliclyAs('public', $name);
           $data['image'] = $name;
           
      }
      $project->update($data);

          return redirect()->route('projects.index')
                  ->with('message', 'Post created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
    }
}
