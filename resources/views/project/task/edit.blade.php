@extends('layouts.app')

@section('title')
    Task Edit
@endsection

@section('content')
    <div class="container">
        <div class="col-md-8">
            <form class="form-horizontal" role='form' action="{{route('task.update', $task->id)}}" method="post">
                {{ method_field('PUT')}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Task Name">Task Name</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name" value="{{$task->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Task Description">Task Description</label>
                    <div>
                        <textarea class="form-control" id="description" name="description">{{$task->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Task Due Date">Task Due Date</label>
                    <div>
                        <input type="text" class="form-control" id="due_date" name="due_date" value="{{$task->due_date}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Task Priority">Task Priority</label>
                    <div>
                        <input type="text" class="form-control" id="priority" name="priority" value="{{$task->priority}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Task Status">Task Status</label>
                    <div>
                        <input type="text" class="form-control" id="status" name="status" value="{{$task->status}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Created">Created</label>
                    <div>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{$task->created_at}}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('project.index')}}" type="submit" class="btn btn-primary pull-right">Task List</a>
                </div>

            </form>
        </div>
    </div>
@endsection
