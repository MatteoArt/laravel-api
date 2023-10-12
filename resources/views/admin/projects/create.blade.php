@extends('layouts.app')

@section('content')
    <h2 class="mb-3 mt-4 text-center">Aggiungi un progetto</h2>
    <form action="{{ route('admin.projects.store') }}" method="POST" class="w-50 m-auto mt-3">
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <label for="titolo">Nome progetto</label>
            </span>
            <input name="title" id="titolo" type="text" class="form-control" placeholder="Nome del progetto"
                aria-label="Nome del progetto" aria-describedby="basic-addon1">
        </div>
        @if($errors->has('title'))
            <div class="text-danger my-error-message">{{ $errors->first('title') }}</div>
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text">
                <label for="descrizione">Descrizione</label>
            </span>
            <textarea name="description" id="descrizione" class="form-control" aria-label="With textarea"></textarea>
        </div>
        @if($errors->has('description'))
            <div class="text-danger my-error-message">{{ $errors->first('description') }}</div>
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <label for="immagine">Immagine</label>
            </span>
            <input name="img" id="immagine" type="text" class="form-control" placeholder="Percorso immagine"
                aria-label="Percorso immagine" aria-describedby="basic-addon1">
        </div>
        @if($errors->has('img'))
            <div class="text-danger my-error-message">{{ $errors->first('img') }}</div>
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <label for="repo">URL Repository</label>
            </span>
            <input name="repository" id="repo" type="text" class="form-control" placeholder="URL Repository"
                aria-label="URL Repository" aria-describedby="basic-addon1">
        </div>
        @if($errors->has('repository'))
            <div class="text-danger my-error-message">{{ $errors->first('repository') }}</div>
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <label for="pagina_progetto">URL progetto</label>
            </span>
            <input name="page_project" id="pagina_progetto" type="text" class="form-control" placeholder="URL Progetto"
                aria-label="URL Progetto" aria-describedby="basic-addon1">
        </div>
        @if($errors->has('page_project'))
            <div class="text-danger my-error-message">{{ $errors->first('page_project') }}</div>
        @endif
        <label for="tipologia">Tipologia progetto</label>
        <select name="type_id" id="tipologia" class="form-select">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success mt-3">Aggiungi</button>
    </form>
@endsection