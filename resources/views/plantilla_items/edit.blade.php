@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Plantilla Item</h1>
    <form action="{{ route('plantilla_items.update', $plantillaItem->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="item_number" class="form-label">Item Number</label>
            <input type="text" class="form-control" id="item_number" name="item_number" value="{{ $plantillaItem->item_number }}" required>
        </div>
        <div class="mb-3">
            <label for="position_title" class="form-label">Position Title</label>
            <input type="text" class="form-control" id="position_title" name="position_title" value="{{ $plantillaItem->position_title }}" required>
        </div>
        <div class="mb-3">
            <label for="position_title" class="form-label">Salary Grade</label>
            <input type="text" class="form-control" id="salarygrade" name="salarygrade" value="{{ $plantillaItem->salarygrade }}" required>
        </div>
        <div class="mb-3">
            <label for="department_id" class="form-label">Department</label>
            <select class="form-control" id="department_id" name="department_id" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $plantillaItem->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
