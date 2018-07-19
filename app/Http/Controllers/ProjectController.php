<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectsPhoto;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except([
            "index", "show", "preview"
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            return view("projects.admin_index")->withProjects(Project::all());
        }
        $projects =  Project::whereDate('start_date', '>',now())->orderBy("start_date")->get();
        $beforeprojects = Project::whereDate('start_date', '<',now())->orderBy("start_date")->get();
        
        return view("projects.guest_index")->withProjects($projects)->with('beforeprojects',$beforeprojects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("projects.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project=Auth::user()->projects()->create($request->all());
        foreach ($request->photos as $photo) {
            $filename = $photo->store('public/photos');
            ProjectsPhoto::create([
                'project_id' => $project->id,
                'filename' => $filename
            ]);
        }
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if ($project->url==null) {
            return view("templates.{$project->category}")->withProject($project);
        }
        else{
            return redirect($project->url); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
         return view("projects.edit")->withProject($project);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back();
    }

    public function preview()
    {
        $projects =  Project::all();
        //------------------------------
        return view("projects.guest_index")->withProjects($projects);
    }

    public function publish(Request $request, Project $project)
    {
        //TODO: Write a code to send email.
        $data = array('name'=>"{$project->event_name}", "venue" => "{$project->venue}", "date" =>"{$project->start_date->format('y-m-d')}","url" =>"{$project->url}","description" =>"{$project->description}");

        \Mail::send('emails.mail', $data, function ($message) {
            $message->from('asanrodn@gmail.com', 'Rodney');
        
            $message->to('rodneykasante@hotmail.com', 'John Doe');
        
            $message->cc('asanrodn@gmail.com', 'John Doe');
            $message->bcc('asanrodn@gmail.com', 'John Doe');
        
            $message->subject('EVENT NOTIFICATION');
        
        });
        return redirect()->back();
    }

}
