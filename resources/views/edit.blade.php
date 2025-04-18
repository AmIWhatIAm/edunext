@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-12 p-5" style="background-color: #EFF7FF;">
            <div class="card shadow-lg p-4 bg-white rounded">
                <h4 class="fw-bold mb-3" style="color: rgb(73, 197, 182);">Edit Subjects</h4>

                <br>

                <h5 class="fw-bold">All Subjects</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Topic Name</th>
                            <th>Subjects</th>
                            <th>Time to Complete</th>
                            <th>Topic File</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allSubjects as $subjectItem)
                            <tr>
                                <td>{{ $subjectItem->id }}</td>
                                <td>{{ $subjectItem->name }}</td>
                                <td>{{ $subjectItem->category }}</td>
                                <td>{{ $subjectItem->time_to_complete }}</td>
                                <td>{{ $subjectItem->file_upload }}</td>
                                <td>{{ $subjectItem->description }}</td>
                                <td>
                                    <a href="{{ route('subject.edit', $subjectItem->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                </td>

                                <td>
                                    <form action="{{ route('subject.destroy', $subjectItem->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection