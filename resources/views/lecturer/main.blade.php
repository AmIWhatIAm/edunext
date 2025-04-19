@extends('layouts.app')

@section('content')
    @php use Illuminate\Support\Str; @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>Subjects</h4>
                <ul class="list-group">
                    @foreach ($subjectList as $subject)
                        <li class="list-group-item">
                            <a href="{{ route('lecturer.main', Str::slug(strtolower($subject))) }}">
                                {{ $subject }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-3">
                    <a href="{{ route('chapter.create') }}" class="btn btn-primary w-100">Add Content</a>
                </div>
            </div>

            <div class="col-md-9">
                @if ($subject)
                    <h3>Chapters for {{ ucfirst($subject) }}</h3>
                    @if ($chapters->isEmpty())
                        <p>No chapters available for this subject.</p>
                    @else
                        <ul class="list-group mt-3">
                            @foreach ($chapters as $chapter)
                                <li class="list-group-item">
                                    <strong>{{ $chapter->name }}</strong><br>
                                    Time: {{ $chapter->time_to_complete }} hrs<br>
                                    {{ $chapter->description }}<br>
                                    @if ($chapter->file_upload)
                                        <a href="{{ asset('storage/uploads/' . $chapter->file_upload) }}" target="_blank">View
                                            File</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <p>Please select a subject to view chapters.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
