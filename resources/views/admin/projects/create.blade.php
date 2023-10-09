@extends('layouts.app')

@section('content')
    <form action="" method="POST" class="w-50 m-auto mt-3">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <label for="titolo">Nome progetto</label>
            </span>
            <input name="title" id="titolo" type="text" class="form-control" placeholder="Nome del progetto"
                aria-label="Nome del progetto" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">
                <label for="descrizione">Descrizione</label>
            </span>
            <textarea name="description" id="descrizione" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">
                <label for="linguaggi">Linguaggi</label>
            </span>
            <textarea name="languages" id="linguaggi" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <label for="repo">URL Repository</label>
            </span>
            <input name="repository" id="repo" type="text" class="form-control" placeholder="URL Repository"
                aria-label="URL Repository" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">
                <label for="pagina_progetto">URL progetto</label>
            </span>
            <input name="page_project" id="pagina_progetto" type="text" class="form-control" placeholder="URL Progetto"
                aria-label="URL Progetto" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
@endsection
