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
        <div class="input-group">
            <span class="input-group-text">
                <label for="descrizione">Descrizione</label>
            </span>
            <textarea name="description" id="descrizione" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
@endsection
