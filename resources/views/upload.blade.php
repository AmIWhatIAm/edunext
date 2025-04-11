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

                <h5 class="fw-bold">Subjects</h5>

                <div class="card">
                    <div class="card-header fw-bold">📚 Subjects</div>
                    <ul class="list-group list-group-flush">
                        <!-- Subject: Mathematics -->
                        <li class="list-group-item">
                            <a class="fw-semibold text-decoration-none" data-bs-toggle="collapse" href="#mathSubjects">
                                Mathematics ▼
                            </a>
                            <div class="collapse mt-2" id="mathSubjects">
                                <ul class="list-group">
                                    <li class="list-group-item">Lesson 01: Algebra <span
                                            class="badge bg-warning text-dark">30 mins</span></li>
                                    <li class="list-group-item">Lesson 02: Geometry <span class="badge bg-primary">45
                                            mins</span></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Subject: Science -->
                        <li class="list-group-item">
                            <a class="fw-semibold text-decoration-none" data-bs-toggle="collapse" href="#scienceSubjects">
                                Science ▼
                            </a>
                            <div class="collapse mt-2" id="scienceSubjects">
                                <ul class="list-group">
                                    <li class="list-group-item">Lesson 01: Biology <span class="badge bg-danger">40
                                            mins</span></li>
                                    <li class="list-group-item">Lesson 02: Chemistry <span class="badge bg-success">50
                                            mins</span></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-5" style="background-color: #EFF7FF;">
                <div class="card shadow-lg p-4 bg-white rounded">
                    <h4 class="fw-bold mb-3" style="color: rgb(73, 197, 182);">Insert new Subject Chapter</h4>

                    <br>

                    <form method="post" action="{{route('test.store')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Enter Subject Name -->
                        <div class="mb-4">
                            <label for="subject_name" class="form-label fw-semibold">Subject Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter subject name">
                        </div>

                        <!-- Select Subject Category -->
                        <div class="mb-4">
                            <label for="subject_category" class="form-label fw-semibold">Subject Category</label>
                            <select class="form-select" id="category" name="category">
                                <option selected disabled>Select category</option>
                                <option value="math">Mathematics</option>
                                <option value="science">Science</option>
                                <option value="history">History</option>
                            </select>
                        </div>

                        <!-- Enter Time to Complete -->
                        <div class="mb-4">
                            <label for="time_to_complete" class="form-label fw-semibold">Time to Complete</label>
                            <input type="text" class="form-control" id="time_to_complete" name="time_to_complete" placeholder="e.g., 2 hours">
                        </div>

                        <!-- Upload File -->
                        <div class="mb-4">
                            <label for="file_upload" class="form-label fw-semibold">File Upload</label>
                            <input type="file" class="form-control" id="file_upload" name="file_upload" accept=".pdf">
                            <small class="text-muted">Only accept PDF</small>
                        </div>

                        <!-- Enter Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Synopsis</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter synopsis"></textarea>
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
