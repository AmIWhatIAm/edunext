{{-- Enable the foostrap function in app.blade.php to see the design --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 bg-white rounded">
        <h4 class="fw-bold text-primary mb-3">Insert new Subject Chapter</h4>

        <br>

        <form>
            <!-- Enter Subject Name -->
            <div class="mb-4">
                <label for="subject_name" class="form-label fw-semibold">Subject Name</label>
                <input type="text" class="form-control" id="subject_name" placeholder="Enter subject name">
            </div>

            <!-- Select Subject Category -->
            <div class="mb-4">
                <label for="subject_category" class="form-label fw-semibold">Subject Category</label>
                <select class="form-select" id="subject_category">
                    <option selected disabled>Select category</option>
                    <option value="math">Mathematics</option>
                    <option value="science">Science</option>
                    <option value="history">History</option>
                </select>
            </div>

            <!-- Enter time to complete -->
            <div class="mb-4">
                <label for="time_to_complete" class="form-label fw-semibold">Time to Complete</label>
                <input type="text" class="form-control" id="time_to_complete" placeholder="e.g., 2 hours">
            </div>

            <!-- Upload file -->
            <div class="mb-4">
                <label for="file_upload" class="form-label fw-semibold">File Upload</label>
                <input type="file" class="form-control" id="file_upload" accept=".pdf">
                <small class="text-muted">Only accept PDF</small>
            </div>

            <!-- Enter Description -->
            <div class="mb-4">
                <label for="description" class="form-label fw-semibold">Synopsis</label>
                <textarea class="form-control" id="description" rows="4" placeholder="Enter synopsis"></textarea>
            </div>

            <!-- Save Button -->
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Save</button>
        </form>
    </div>
</div>
@endsection
