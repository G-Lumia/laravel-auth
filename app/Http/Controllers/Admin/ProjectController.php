<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Doctrine\DBAL\Schema\View;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $projects = Project::paginate(3);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @
     */
    public function create()
    {
        $typess = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Str::slug($form_data['name']); // Generate slug based on project name
        $newProject = Project::create($form_data);
        return redirect()->route('admin.projects.show' , $project->slug)->with('message', "The project {$newProject->name} saved with success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     *
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project' , 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     *
     */
    public function update(UpdateProjectRequest $request, Project  $project)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Str::slug($form_data['name']); // Generate slug based on project name
        $project->update($form_data);
        return view('admin.projects.show', compact('project'))->with('message', "The project {$project->name} edited with success");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function destroy(Project  $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->name deleted successfully.");
    }

    private function validation($data)
    {
        $validator = Validator::make($data,
        [
            'name' => 'required|max:255|min:3',
            'image'=> 'required',
            'link' => 'required'
        ],
        [
                'name.required' => "You must add a name",
                'name.max' => "name is longer than 255",
                'name.min' => "name is shorter than 3",
                'image.required' => "You must add a image",
                'link.required' => "You must add a link"
        ])->validate();
        return $validator;

    }
}
