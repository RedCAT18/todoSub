@extends('layouts.app')

@section('title')
    Task List
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <p>
                <a href="{{route('task.create')}}" class="btn btn-success">Create</a>
            </p>
            <!--안내 메세지를 받아서 출력한다-->
            @if (Session::has('message'))
                <div class="alert alert-info">
                    {{Session::get('session')}}
                </div>
            @endif

            <!--테이블 출력-->
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Project</td>
                    <td>Description</td>
                    <td>Due Date</td>
                    <td>Priority</td>
                    <td>Status</td>
                    <td>Created</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task) <!--$tasks : controller에서 네이밍됨-->
                <tr>
                    <td><a href="#">{{$task->name}}</a></td>
                    {{--<td><a href="{{url("task.show", $task->id)}}">{{$task->name}}</a></td>--}}
                    <td>{{$task->project_id->name}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->due_date}}</td>
                    <td>{{$task->priority}}</td>
                    <td>{{$task->status}}</td>
                    <td>{{$project->created_at}}</td>
                    <td><a href="{{route('task.edit', $task->id)}}" class="btn btn-info">UPDATE</a></td>
                    <td>
                        <form class="form-horizontal" role="form" action="{{route('task.destroy', $task->id)}}" method="POST">
                            {{method_field("DELETE")}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection