@extends('layouts.app')

@section('content')
    @php use Illuminate\Support\Str; @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>Subjects</h4>
                @if (session('last_subject'))
                    <div class="alert alert-info">
                        Last time you viewed: {{ Str::title(session('last_subject')) }}
                    </div>
                @endif
                <ul class="list-group">
                    @foreach ($subjectList as $sub)
                        <li class="list-group-item">
                            <a class="text-decoration-none" href="{{ route('student.main', Str::slug(strtolower($sub))) }}">
                                {{ $sub }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-9">
                @if ($subject)
                    <h3>Chapters for {{ ucwords($subject) }}</h3>

                    @if ($chapters->isEmpty())
                        <p>No chapters available for this subject.</p>
                    @else
                        <ul class="list-group mt-3">
                            @foreach ($chapters as $chapter)
                                <li class="list-group-item">
                                    <strong>{{ $chapter->name }}</strong><br>
                                    Time to complete: {{ $chapter->time_to_complete }} hours<br>
                                    Description: {{ $chapter->description }}<br>
                                    @if ($chapter->file_upload)
                                        <a href="{{ asset('storage/uploads/' . $chapter->file_upload) }}" target="_blank">
                                            View File
                                        </a>
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
