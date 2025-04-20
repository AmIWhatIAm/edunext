@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 bg-light vh-100 p-4 shadow-sm">

                <!-- Back Button -->
                <a href="{{ url('/') }}" class="btn btn-outline-primary mb-3">
                    ← Back
                </a>

                <div class="card">
                    <div class="card-header fw-bold">📚 Subjects</div>
                    <ul class="list-group list-group-flush">

                    @foreach($subjects as $subject => $chapters)
                        <!-- Subject: Mathematics -->
                        <li class="list-group-item">
                            <a
                                class="fw-semibold text-decoration-none"
                                href="#subject{{ Str::slug($subject) }}"                                role="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#subject{{ Str::slug($subject) }}"
                                aria-expanded="false"
                                aria-controls="subject{{ Str::slug($subject) }}"
                            >
                                {{ $subject }} ▼
                            </a>
                            <div class="collapse mt-2" id="subject{{ Str::slug($subject) }}">
                                <ul class="list-group">
                                    @foreach ($chapters as $chapter)
                                        <li class="list-group-item">
                                            <a class="text-decoration-none" href="#">
                                                {{ $chapter->name }}
                                            </a>
                                            <span class="badge bg-secondary float-end">
                                                {{ $chapter->time_to_complete }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-5" style="background-color: #EFF7FF;">
                <div class="card shadow-lg p-4 bg-white rounded">
                    <h4 class="fw-bold mb-3" style="color: rgb(73, 197, 182);">Insert new Chapter for a Subject</h4>

                    <br>

                    <form method="post" action="{{route('chapter.store')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Enter Chapter Name -->
                        <div class="mb-4">
                            <label for="chapter_name" class="form-label fw-semibold">Chapter Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter chapter name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Select Subject -->
                        <div class="mb-4">
                            <label for="chapter_subject" class="form-label fw-semibold">Subjects</label>
                            <select class="form-select" id="subject" name="subject">
                                <option selected disabled>Select Subject</option>
                                @foreach(array_keys($subjects) as $subjectName)
                                    <option value="{{ $subjectName }}">{{ $subjectName }}</option>
                                @endforeach
                            </select>
                            @error('subject')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Enter Time to Complete -->
                        <div class="mb-4">
                            <label for="time_to_complete" class="form-label fw-semibold">Time to Complete</label>
                            <input type="number" class="form-control" id="time_to_complete" name="time_to_complete" placeholder="e.g., 2" min="0">
                            @error('time_to_complete')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Upload File -->
                        <div class="mb-4">
                            <label for="file_upload" class="form-label fw-semibold">File Upload</label>
                            <input type="file" class="form-control" id="file_upload" name="file_upload">
                            <small class="text-muted">Only accept PDF</small>
                            @error('file_upload')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Enter Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Topic Description"></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <br>

                        <!-- Save Button -->
                        <button type="submit" class="btn text-white w-100 py-2"
                            style="background-color: rgb(73, 197, 182);">
                            Save
                        </button>      
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
