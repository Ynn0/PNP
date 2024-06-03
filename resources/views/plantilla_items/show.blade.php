@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Plantilla Item Details</h1>
    <p><strong>Item Number:</strong> {{ $plantillaItem->item_number }}</p>
    <p><strong>Position Title:</strong> {{ $plantillaItem->position_title }}</p>
    <p><strong>Salary Grade:</strong> {{ $plantillaItem->salarygrade }}</p>
    <p><strong>Department:</strong> {{ $plantillaItem->department->name }}</p>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
