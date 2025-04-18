@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-12 p-5" style="background-color: #EFF7FF;">
            <div class="card shadow-lg p-4 bg-white rounded">
                <h4 class="fw-bold mb-3" style="color: rgb(73, 197, 182);">Edit Chapters</h4>

                <br>

                <h5 class="fw-bold">All Chapters</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Time to Complete</th>
                            <th>File Upload</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allChapters as $chapterItem)
                            <tr>
                                <td>{{ $chapterItem->id }}</td>
                                <td>{{ $chapterItem->name }}</td>
                                <td>{{ $chapterItem->category }}</td>
                                <td>{{ $chapterItem->time_to_complete }}</td>
                                <td>{{ $chapterItem->file_upload }}</td>
                                <td>{{ $chapterItem->description }}</td>
                                <td>
                                    <a href="{{ route('chapter.edit', $chapterItem->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                </td>

                                <td>
                                    <form action="{{ route('chapter.destroy', $chapterItem->id) }}" method="POST" style="display:inline;">
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