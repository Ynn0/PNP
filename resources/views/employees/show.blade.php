@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>
    <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
    <p><strong>Plantilla Item:</strong> {{ $employee->plantillaItem->item_number }} - {{ $employee->plantillaItem->position_title }}</p>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
