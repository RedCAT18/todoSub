<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1.data준비
        $user = \Auth::user(); // 현재 로그인 한 유저를 식별
        $data['projects'] = Project::where('user_id', $user->id)->get(); //data 오브젝트에 추출한 데이터를 담는다

        //2.화면 로딩+data
        return view('project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 화면 보여주기
    {
        //
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // 데이터 저장
    {
        //dd($request->all());

        $user = \Auth::user();
        $project = new Project();

        $project->name = $request->name;
        $project->description = $request->description;
        $project->user()->associate($user->id); //fk연동
        $project->save();

        return redirect('/project')->with('message', $project->name. 'has been created.');
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
        $data['project'] = Project::findOrFail($id);

        if($data['project']==null){
            abort(404, $id."Model has not found.");
        }

        return view('project.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd('edit:', $id);
        //1. data 준비
        $data['project'] = Project::findOrFail($id);

        //2. 화면 로딩 + data
        return view('project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        //
        // $project->update([
        //     'name' => $request->name,
        //     'description' => $request->description
        // ]);

        $project->name = $request->name;
        $project->description = $request->description;
        $project->save();

        return redirect('/project')->with('message', $project->name. "has been created.");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //1. data search
        $project = Project::findOrFail($id);

        foreach($project->tasks as $task){
            $task->delete();
        }
        //자식 먼저 delete하고 부모를 delete한다.
        $project->delete();
        return redirect('/project')->with('message', $project->name. "has been deleted.");

    }
}
