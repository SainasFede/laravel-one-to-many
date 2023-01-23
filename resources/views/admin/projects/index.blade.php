@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1>Dash</h1>
            <a class="my-1 btn btn-success" href="{{route('admin.projects.create')}}">Create</a>
        </div>
        <table class="table text-white">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Client_name</th>
                <th scope="col">Type</th>
                <th scope="col">Summary</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)

              <tr class="text-warning">
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->name}}</td>
                <td>{{$project->client_name}}</td>
                <td><span class="badge text-bg-primary">{{$project->category?->type}}</span></td>
                <td>{{$project->summary}}</td>
                <td><img class="thumb" src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : 'https://img.freepik.com/free-vector/illustration-data-folder-icon_53876-6329.jpg?w=2000'}}" alt=""></td>
                <td class="d-flex flex-column ">
                    <a class="my-1 btn btn-primary" href="{{route('admin.projects.show', $project)}}">Show</a>
                    <a class="my-1 btn btn-warning" href="{{route('admin.projects.edit', $project)}}">Edit</a>
                    <form onsubmit="return confirm('Vuoi eliminare : {{$project->name}}')"
                        class="d-inline"
                        action="{{route('admin.projects.destroy', $project)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                        title="Delete">Delete</button>
                    </form>
                </td>
             </tr>
            @endforeach
            </tbody>
        </table>
        {{$projects->links()}}
    </div>
@endsection
