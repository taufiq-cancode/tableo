@extends('layouts.app')

@section('content')
<div class="container mb-4">
    <h1 class="mb-4">Restaurants</h1>
    <ul class="list-group">
        @foreach($restaurants as $restaurant)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $restaurant->name }}
                <div>
                    <a href="{{ route('tables.index', $restaurant->id) }}" class="btn btn-primary btn-sm">Tables</a>
                    <a href="{{ route('tables.active', $restaurant->id) }}" class="btn btn-secondary btn-sm">Active Tables</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
