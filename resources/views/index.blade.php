@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Tests</h1>
    <a href="{{ route('tests.create') }}" class="btn btn-primary mb-3">Create New</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tests as $test)
            <tr>
                <td>{{ $test->name }}</td>
                <td>{{ ucfirst($test->category) }}</td>
                <td>{{ $test->time_to_complete }} mins</td>
                <td>
                    <a href="{{ route('subject.edit', $test) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('subject.destroy', $test) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection