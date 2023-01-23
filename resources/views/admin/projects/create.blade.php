@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between my-5">
            <h1 class="d-inline">Importa un Progetto</h1>
            <div>
                <a class="btn btn-success" href="{{route('admin.projects.index')}}">Torna all'elenco Progetti</a>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h6>Errore</h6>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
          </div>
        @endif

        <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name"class="form-label"><strong>Nome Progetto</strong></label>
                <input type="text"
                name="name"
                value="{{old('name')}}"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder="Scrivi il nome">
                @error('name')
                <div class="invalid-feedback">
                  <h6>{{$message}}</h6>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label"><strong>Sommario</strong></label>
                <textarea class="form-control"
                name="summary"
                id="summary"
                rows="5">{{old('summary')}}</textarea>
                <div class="invalid-feedback">
                  <h6></h6>
                </div>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label"><strong>Immagine</strong></label>
                <input type="file"
                onchange="showImage(event)"
                name="cover_image"
                value="{{ old('cover_image')}}"
                class="form-control @error('cover_image') is-invalid @enderror"
                id="cover_image"
                placeholder="Inserisci percorso">
                @error('cover_image')
                <div class="invalid-feedback">
                  <h6>{{$message}}</h6>
                </div>
                @enderror
                <div>
                    <img src="" width="100" id="output-image" alt="">
                </div>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Cateorie</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <option value="">Selezionare una categoria</option>
                    @foreach ($categories as $category)
                        <option
                        @if($category->id == old('category_id')) selected @endif
                         value="{{$category->id}}">{{$category->type}}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <label for="Nome Cliente" class="form-label"><strong>Nome Cliente</strong></label>
                <input type="text"
                name="client_name"
                value="{{old('client_name')}}"
                class="form-control @error('client_name') is-invalid @enderror"
                id="client_name"
                placeholder="Quanto costa">
                @error('client_name')
                <div class="invalid-feedback">
                  <h6>{{$message}}</h6>
                </div>
                @enderror
            </div>

              <button type="submit" class="btn btn-primary mb-5">Invia</button>
        </form>

    </div>

    <script>
        function showImage(event){
    	const tagImage = document.getElementById('output-image');
    	tagImage.src = URL.createObjectURL(event.target.files[0]);
	}

    </script>
@endsection
