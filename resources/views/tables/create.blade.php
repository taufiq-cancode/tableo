@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <a href="{{ route('restaurants.index') }}" class="btn btn-secondary mr-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1>Create a New Table</h1>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('tables.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Table Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="minimum_capacity">Minimum Capacity</label>
            <input type="number" name="minimum_capacity" id="minimum_capacity" class="form-control" value="{{ old('minimum_capacity') }}" required>
        </div>

        <div class="form-group">
            <label for="maximum_capacity">Maximum Capacity</label>
            <input type="number" name="maximum_capacity" id="maximum_capacity" class="form-control" value="{{ old('maximum_capacity') }}" required>
        </div>

        <div class="form-group">
            <label for="active">Active</label>
            <select name="active" id="active" class="form-control" required>
                <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="restaurant_id">Restaurant</label>
            <select name="restaurant_id" id="restaurant_id" class="form-control" required>
                @foreach($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}" {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                        {{ $restaurant->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group position-relative">
            <label for="dining_area">Dining Area</label>
            <input type="text" name="dining_area" id="dining_area" class="form-control" value="{{ old('dining_area') }}" required>
            <div id="dining_area_dropdown" class="dropdown-menu w-100"></div>
        </div>

        <button type="submit" class="btn btn-primary">Create Table</button>
    </form>
</div>
@endsection

@section('styles')
<style>
    .dropdown-item {
        cursor: pointer;
    }
    .dropdown-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dining_area').on('input', function() {
            var query = $(this).val();

            if (query.length >= 2) {
                $.ajax({
                    url: "{{ route('dining-areas.index') }}",
                    data: { query: query },
                    success: function(data) {
                        var dropdown = $('#dining_area_dropdown');
                        dropdown.empty();
                        if (data.length) {
                            $.each(data, function(index, item) {
                                dropdown.append('<a href="#" class="dropdown-item dining-area-item" data-value="' + item.name + '">' + item.name + '</a>');
                            });
                        } else {
                            dropdown.append('<a href="#" class="dropdown-item disabled">No results found</a>');
                        }
                        dropdown.show();
                    }
                });
            } else {
                $('#dining_area_dropdown').hide();
            }
        });

        $(document).on('click', '.dining-area-item', function(e) {
            e.preventDefault();
            var diningAreaName = $(this).data('value');
            $('#dining_area').val(diningAreaName);
            $('#dining_area_dropdown').hide();
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#dining_area').length) {
                $('#dining_area_dropdown').hide();
            }
        });
    });
</script>
@endsection
