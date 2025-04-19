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

                    @foreach($categories as $category => $subjects)
                        <!-- Subject: Mathematics -->
                        <li class="list-group-item">
                            <a class="fw-semibold text-decoration-none" data-bs-toggle="collapse" href="#category{{ Str::slug($category) }}">
                                {{$category}} ▼
                        </a>
                            <div class="collapse mt-2" id="category{{ Str::slug($category) }}">
                                <ul class="list-group">
                                    @foreach ($subjects as $subject)
                                        <li class="list-group-item">
                                            <a class="text-decoration-none" href="#">
                                                {{ $subject->name }}
                                            </a>
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
                    <h4 class="fw-bold mb-3" style="color: rgb(73, 197, 182);">Insert new Topic</h4>

                    <br>

                    <form method="post" action="{{route('subject.store')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Enter Subject Name -->
                        <div class="mb-4">
                            <label for="subject_name" class="form-label fw-semibold">Topic Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Topic Name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Select Subject Category -->
                        <div class="mb-4">
                            <label for="subject_category" class="form-label fw-semibold">Subject </label>
                            <select class="form-select" id="category" name="category">
                                <option selected disabled>Select Subject</option>
                                <option value="Mathematic">Mathematic</option>
                                <option value="Science">Science</option>
                                <option value="History">History</option>
                            </select>
                            @error('category')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Enter Time to Complete -->
                        <div class="mb-4">
                            <label for="time_to_complete" class="form-label fw-semibold">Time to Complete</label>
                            <input type="text" class="form-control" id="time_to_complete" name="time_to_complete" placeholder="e.g., 2 hours">
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
