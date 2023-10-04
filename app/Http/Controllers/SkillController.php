<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Skill;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use App\Http\Resources\SkillResource;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
          
          $skills = SkillResource::collection(Skill::all());
          return Inertia('Skills/Index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia('Skills/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data =   $request->validate([
            'name' => ['required', 'min:5'],
            'image' => ['required', 'image'],
        ]);

        // if($request->hasFile('image')) {
        //   $image = $request->file('image')->store('skills');
        //   Skill::create([
        //     'name' => $request->name,
        //     'image' => $request->image
        //   ]);
        // }

        if($request->hasFile('image')) {
            $file = $request->file('image');
           $name = 'skills/' .uniqid() .  '.' . $file->extension();
           $file->storePubliclyAs('public', $name);
           $data['image'] = $name;
           
      }
      Skill::create($data);

          return redirect()->route('skills.index')
          ->with('message', 'Post created successfully');
      }
    

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return inertia('Skills/Edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $image = $skill->image;
        $data =   $request->validate([
            'name' => ['required', 'min:5'],     
        ]);

        //   if($request->hasFile('image')) {
        //      Storage::delete($skill->image);
        //     $image =$request->file('image')->store('skills');
        // }

        // $skill->update([
        //    'name' =>  $request->name,
        //    'image' => $image
        // ]);

        if($request->hasFile('image')) {
            Storage::delete($skill->image);
            $file = $request->file('image');
           $name = 'skills/' .uniqid() .  '.' . $file->extension();
           $file->storePubliclyAs('public', $name);
           $data['image'] = $name;
           
      }
      $skill->update($data);

          return redirect()->route('skills.index')
          ->with('message', 'Post created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
         Storage::delete($skill->image);
         $skill->delete();

         return redirect()->route('skills.index')
          ->with('message', 'Post created successfully');
    }
}
