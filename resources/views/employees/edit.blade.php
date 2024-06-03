@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="plantilla_item_id">Plantilla Item:</label>
            <select class="form-control" id="plantilla_item_id" name="plantilla_item_id" required>
                @foreach($plantillaItems as $item)
                    <option value="{{ $item->id }}" {{ $employee->plantilla_item_id == $item->id ? 'selected' : '' }}>{{ $item->item_number }} - {{ $item->position_title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
