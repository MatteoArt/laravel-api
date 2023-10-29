@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Colore</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
            <tr>
                <th scope="row"> {{ $type->id }} </th>
                <td> {{ $type->name }} </td>
                <td>
                    @if ($type->description)
                        <span> {{ $type->description }} </span>
                    @else
                        <span>//</span>
                    @endif
                </td>
                <td>
                    @if ($type->color)
                        <span> {{ $type->color }} </span>
                    @else
                        <span>//</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection