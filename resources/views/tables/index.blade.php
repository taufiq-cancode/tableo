@extends('layouts.app')

@section('content')
<div class="container mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('restaurants.index') }}" class="btn btn-secondary mr-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1>{{ $restaurant->name }} - Tables</h1>
        </div>
        <a href="{{ route('tables.create') }}" class="btn btn-primary">Create Table</a>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Minimum Capacity</th>
                <th>Maximum Capacity</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
                <tr>
                    <td>{{ $table->name }}</td>
                    <td>{{ $table->minimum_capacity }}</td>
                    <td>{{ $table->maximum_capacity }}</td>
                    <td>{{ $table->active ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
