@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Departments</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add Department</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>
                    <a href="{{ route('departments.show', $department->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container">
    <h1>Plantilla Items</h1>
    <a href="{{ route('plantilla-items.create') }}" class="btn btn-primary mb-3">Add Plantilla Item</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Number</th>
                <th>Position Title</th>
                <th>Salary Grade</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plantillaItems as $plantillaItem)
            <tr>
                <td>{{ $plantillaItem->id }}</td>
                <td>{{ $plantillaItem->item_number }}</td>
                <td>{{ $plantillaItem->position_title }}</td>
                <td>{{ $plantillaItem->salarygrade }}</td>
                <td>{{ $plantillaItem->department->name }}</td>
                <td>
                    <a href="{{ route('plantilla-items.show', $plantillaItem->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('plantilla-items.edit', $plantillaItem->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('departments.destroy', $plantillaItem->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
