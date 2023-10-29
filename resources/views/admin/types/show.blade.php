@extends('layouts.app')

@section('content')
    <div class="card m-auto my-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"> {{ $type->name }} </h5>
            @if ($type->description)
                <p class="card-text">
                    {{ $type->description }}
                </p>
            @else
                <span>//</span>
            @endif

            @if ($type->color)
                <h6 class="card-subtitle mb-2 text-body-secondary"> {{ $type->color }} </h6>
            @else
                <span>//</span>
            @endif
        </div>
    </div>
@endsection
