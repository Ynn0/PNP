@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Department Details</h1>
    <p><strong>Name:</strong> {{ $department->name }}</p>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
