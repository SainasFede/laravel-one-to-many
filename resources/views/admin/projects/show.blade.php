@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between my-5">
            <h1 class="d-inline">Mostra il progetto</h1>
            <div>
                <a class="btn btn-success" href="{{route('admin.projects.index')}}">Torna all'elenco Progetti</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : 'https://img.freepik.com/free-vector/illustration-data-folder-icon_53876-6329.jpg?w=2000'}}" class="card-img-top" alt="{{$project->name}}">
            <div class="card-body">
              <h5 class="card-title">{{$project->name}}</h5>
              <h6 class="card-title">{{$project->category->type}}</h6>
              <p class="card-text">{{$project->summary}}</p>
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
            </div>
          </div>
    </div>
@endsection
