@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Immagine</th>
                <th scope="col">Linguaggi</th>
                <th scope="col">Categoria</th>
                <th scope="col">Repository</th>
                <th scope="col">Pagina progetto</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row"> {{ $project->id }} </th>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->id) }}">{{ $project->title }}</a>
                    </td>
                    <td> {{ $project->description }} </td>
                    <td class="my-table-img">
                        <img class="img-fluid" src="{{ $project->img }}" alt="img project">
                    </td>
                    <td>
                        {{ implode(', ', json_decode($project->languages)) }}
                    </td>
                    <td>
                        @if ($project->type_id)
                            <span>
                                {{ $project->type->name }}
                            </span>
                        @else
                            <span>//</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ $project->repository }}" target="_blank"> {{ $project->repository }} </a>
                    </td>
                    <td>
                        @if ($project->page_project)
                           <a href="{{ $project->page_project }}" target="_blank"> {{ $project->page_project }} </a>
                        @else
                           <span>//</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                            @csrf

                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Elimina">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
