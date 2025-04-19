@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h4>Subjects</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ url('/category/math/chapters') }}">Mathematics</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('/category/science/chapters') }}">Science</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('/category/history/chapters') }}">History</a>
                </li>
            </ul>
            <div class="mt-3">
                <a href="{{ route('upload.page') }}" class="btn btn-primary w-100">Add Content</a>
            </div>
        </div>

        <div class="col-md-9">
            @if(isset($category))
                <h3>Chapters for {{ ucfirst($category) }}</h3>
                @if($chapters->isEmpty())
                    <p>No chapters available for this category.</p>
                @else
                    <ul class="list-group mt-3">
                        @foreach($chapters as $chapter)
                            <li class="list-group-item">
                                <strong>{{ $chapter->name }}</strong><br>
                                Time to complete: {{ $chapter->time_to_complete }} hours<br>
                                Description: {{ $chapter->description }}<br>
                                @if($chapter->file_upload)
                                    <a href="{{ asset('storage/uploads/' . $chapter->file_upload) }}" target="_blank">View File</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            @else
                <p>Please select a category to view chapters.</p>
            @endif
        </div>
    </div>
</div>
@endsection
