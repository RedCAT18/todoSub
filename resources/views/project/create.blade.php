@extends('layouts.app')

@section('title')
  Project Create
@endsection

@section('content')
    <div class="container">
        <div class="col-md-8">
            <h3>New Project</h3>
            <form class="form-horizontal" role='form' action="{{route('project.store')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Project Name">Project Name</label>
                    <div>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Project Description">Project Description</label>
                    <div>
                        <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
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
                    <a href="{{route('project.index')}}" type="submit" class="btn btn-primary pull-right">Project List</a>
                </div>
            </form>
        </div>
    </div>
@endsection
