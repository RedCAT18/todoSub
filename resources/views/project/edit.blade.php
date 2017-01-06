@extends('layouts.app')

@section('title')
  Project Edit
@endsection

@section('content')
    <div class="container">
        <div class="col-md-8">
            <form class="form-horizontal" role='form' action="{{route('project.update', $project->id)}}" method="post">
                {{ method_field('PUT')}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Project Name">Project Name</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name" value="{{$project->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Project Description">Project Description</label>
                    <div>
                        <textarea class="form-control" id="description" name="description">{{$project->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Created">Created</label>
                    <div>
                        <input type="text" class="form-control" id="created_at" name="created_at" value="{{$project->created_at}}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('project.index')}}" type="submit" class="btn btn-primary pull-right">Project List</a>
                </div>

            </form>
        </div>
    </div>
@endsection
