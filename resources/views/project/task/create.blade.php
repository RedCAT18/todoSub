@extends('layouts.app')

@section('title')
    Task Create
@endsection

@section('content')
    <div class="container">
        <div class="col-md-8">
            <h3>New Task</h3>
            <form class="form-horizontal" role='form' action="{{route('task')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="Task Name">Task Name</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Project Name">Project Name</label>
                    <div>
                        <select name="project_id" id="project_id">
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Task Description">Task Description</label>
                    <div>
                        <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Task Dye Date">Task Due Date</label>
                    <div>
                        <input type="text" class="form-control" id="due_date" name="due_date" value="{{old('due_date')}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Task Priority">Task Priority</label>
                    <div>
                        {{--<input type="text" class="form-control" id="priority" name="priority" value="{{old('priority')}}">--}}
                        <select name="priority" id="priority">
                            <option value="high">High</option>
                            <option value="normal" selected>Normal</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Task Status">Task Status</label>
                    <div>
                        {{--<input type="text" class="form-control" id="status" name="status" value="{{old('status')}}">--}}
                        <select name="status" id="status">
                            <option value="todo" selected>Todo</option>
                            <option value="in-processing">In-Processing</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Created">Created</label>
                    <div>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{old('created_at')}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Updated">Updated</label>
                    <div>
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{old('updated_at')}}">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="#" type="submit" class="btn btn-primary pull-right">Task List</a>
                </div>
            </form>
        </div>
    </div>
@endsection
