@extends('layouts.app')

@section('title')
  Project List
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            <p>
                <a href="{{route('project.create')}}" class="btn btn-success">Create</a>
            </p>
            <!--안내 메세지를 받아서 출력한다-->
            @if (Session::has('message'))
                <div class="alert alert-info">
                    {{Session::get('session')}}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                      <td>Name</td>
                      <td>Description</td>
                      <td>Created</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project) <!--$projects : controller에서 네이밍됨-->
                        <tr>
                            <td><a href="{{route("project.show", $project->id)}}">{{$project->name}}</a></td>
                            <td>{{$project->description}}</td>
                            <td>{{$project->created_at}}</td>
                            <td><a href="{{route('project.edit', $project->id)}}" class="btn btn-info">UPDATE</a></td>
                            <td>
                              <form class="form-horizontal" role="form" action="{{route('project.destroy', $project->id)}}" method="POST">
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
