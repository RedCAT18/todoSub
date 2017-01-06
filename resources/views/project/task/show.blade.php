@extends('layouts.app')

@section('title')
    Task Detail
@endsection

@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="form-group">
                <label for="Project Name">Task Name</label>
                <div>
                    <input type="text" class="form-control" id="name" name="name" value="{{$task->name}}" readonly="true">
                </div>
            </div>

            <div class="form-group">
                <label for="Project Description">Task Description</label>
                <div>
                    <textarea class="form-control" id="description" name="description" readonly="true">{{$taskt->description}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="Project Name">Task Due Date</label>
                <div>
                    <input type="text" class="form-control" id="due_date" name="due_date" value="{{$task->due_date}}" readonly="true">
                </div>
            </div>

            <div class="form-group">
                <label for="Project Name">Task Priority</label>
                <div>
                    <input type="text" class="form-control" id="priority" name="priority" value="{{$task->priority}}" readonly="true">
                </div>
            </div>

            <div class="form-group">
                <label for="Project Name">Task Status</label>
                <div>
                    <input type="text" class="form-control" id="status" name="status" value="{{$task->status}}" readonly="true">
                </div>
            </div>

            <div class="form-group">
                <label for="Created">Created</label>
                <div>
                    <input type="text" class="form-control" id="created_at" name="created_at" value="{{$task->created_at}}">
                </div>
            </div>
            <div class="form-group">
                <label for="Updated">Updated</label>
                <div>
                    <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{$task->updated_at}}">
                </div>
            </div>

            <div class="form-group">
                {{--<a href="{{route('project.index')}}" type="submit" class="btn btn-primary">Project List</a>--}}
                {{--<a href="{{route('task.index', $project->id)}}" class="btn btn-primary pull-right">Task List</a>--}}
            </div>

        </div>
    </div>
@endsection
