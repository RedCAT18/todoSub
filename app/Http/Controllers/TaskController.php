<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//해당 유저의 전체 태스크 리스트
    public function index() {
        $user = \Auth::user(); // 현재 로그 인 한 유저를 식별
        $projects = Project::where('user_id','=', $user->id)->get(); //data 오브젝트에 추출한 데이터를 담는다

        foreach($projects as $project) {
            $tasks[$project->id] = Task::where('project_id','=', $project->id)->get();
        }
        //2. 화면 불러오기 + 데이터

//        dd($tasks);
        return view('project.task.index', compact('projects','tasks'));
    }

    //각 프로젝트 별 태스크 리스트.
        public function listUp($id)
    {
        //1. data 준비
        //프로젝트 식별
        $data['tasks']= Task::where('project_id','=',$id)->get();
//
        //2. 화면 불러오기 + 데이터
//       dd($data['tasks']);

        return view('project.task.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = \Auth::user();
        $data['projects'] = Project::where('user_id','=', $user->id)->get();


//        $rsp = new AjaxResponse();
//
//        $data['html'] = \View::make('task.create')->render(); //make : memory에 올린다.
//
//        $rsp-> success = 1;
//        $rsp-> data = $data;
//
//        return $rsp->toArray(); //ajax형태로 내보냄(array).

        return view('project.task.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $task = new Task();

        $task->name = $request->name;
        $task->description = $request->description;
        $task->project_id = $request->project_id;
        $task->due_date = $request->due_date;
        $task->priority = $request->priority;

        $task->save();

        return redirect('task/{id}')->with('message', $task->name. 'has been created.');
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
        $data['tasks'] = Task::findOrFail($id);

        if($data['tasks']==null){
            abort(404, $id."Model has not found.");
        }

        return view('project.task.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['task'] = Task::findOrFail($id);

        //2. 화면 로딩 + data
        return view('project.task.edit',    $data);
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
        //
        $task = Task::findOrFail($id);

        $task->name = $request->name;
        $task->description = $request->description;
        $task->project_id = $request->project_id;
        $task->due_date = $request->due_date;
        $task->priority = $request->priority;

        $task->save();

        return redirect('/task')->with('message', $task->name. 'has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::findOrFail($id);

        $task->delete();
        return redirect('/task')->with('message', $task->name. "has been deleted.");
    }
}
