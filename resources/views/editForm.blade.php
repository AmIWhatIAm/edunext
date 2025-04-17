@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-12 p-5" style="background-color: #EFF7FF;">
                <div class="card shadow-lg p-4 bg-white rounded">
                    <h4 class="fw-bold mb-3" style="color: rgb(73, 197, 182);">Edit Subject Details</h4>

                    <br>

                    <form method="post" action="{{ route('subject.update', $subject->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Enter Subject Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Subject Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $subject->name }}" placeholder="Enter subject name">
                        </div>

                        <div class="mb-4">
                            <label for="subject_category" class="form-label fw-semibold">Subject Category</label>
                            <select class="form-select" id="category" name="category">
                                <option selected disabled>Select category</option>
                                <option value="math" {{ $subject->category == 'math' ? 'selected' : ''}}>Mathematics</option>
                                <option value="science" {{ $subject->category == 'math' ? 'selected' : ''}}>Science</option>
                                <option value="history" {{ $subject->category == 'math' ? 'selected' : ''}}>History</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="time_to_complete" class="form-label fw-semibold">Time to Complete</label>
                            <input type="text" class="form-control" id="time_to_complete" value="{{ $subject->time_to_complete }}" name="time_to_complete" placeholder="e.g., 2 hours">
                        </div>

                        <div class="mb-4">
                            <label for="file_upload" class="form-label fw-semibold">File Upload</label>
                            <input type="file" class="form-control" id="file_upload" name="file_upload" accept=".pdf">
                            
                            <!-- Disply the name of the  currently uploaded file -->
                            @if($subject->file_upload)
                                <small class="subject-muted">Current file: <a href="{{asset('storage/uploads/' .$subject->file_upload) }}" target="_blank" download>{{$subject->file_upload}}</a></small>
                            @else
                                <small class="text-muted">Only accept PDF</small>
                            @endif
                        </div>

                        <!-- Enter Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description">{{ $subject->description }}</textarea>
                        </div>


                        <br>

                        <!-- Save Button -->
                        <button type="submit" class="btn text-white w-100 py-2"
                            style="background-color: rgb(73, 197, 182);">
                            Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
