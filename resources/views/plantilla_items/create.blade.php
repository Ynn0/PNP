@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Plantilla Item</h1>
    <form action="{{ route('plantilla-items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item_number">Item Number:</label>
            <input type="text" class="form-control" id="item_number" name="item_number" required>
        </div>
        <div class="form-group">
            <label for="position_title">Position Title:</label>
            <input type="text" class="form-control" id="position_title" name="position_title" required>
        </div>
        <div class="form-group">
            <label for="position_title">Salary Grade:</label>
            <input type="text" class="form-control" id="salarygrade" name="" required>
        </div>
        <div class="form-group">
            <label for="department_id">Department:</label>
            <select class="form-control" id="department_id" name="department_id" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
