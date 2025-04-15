@extends('layouts.app')

@section('title', 'Home | EduNext')

@section('content')
    <!-- Hero Section with Upside-Down Semicircle Background -->
    <div class="position-relative" style="height: 600px; overflow: hidden;">
        <div style="
                                                                                            background-color: #49bbbd;
                                                                                            width: 200%;
                                                                                            height: 1500px;
                                                                                            position: absolute;
                                                                                            bottom: 0;
                                                                                            left: -50%;
                                                                                            border-radius: 0 0 100% 100%;
                                                                                        ">
        </div>

        <!-- Content inside the semicircle -->
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between text-white"
            style="position: relative; z-index: 2; height: 100%;">
            <!-- Left Content -->
            <div class="mb-5 mb-md-0" style="max-width: 500px;">
                <h1 style="font-size: 2.5rem; font-weight: bold;">
                    Excel with <span style="color: #ffa534;">EduNext</span><br> Tuition Centre
                </h1>
                <p class="mt-3" style="font-size: 1.1rem;">
                    EduNext offers personalized learning with expert tutors, interactive courses, and quizzes
                </p>
                <div class="mt-4">
                    <a href="#" class="btn btn-light me-3">I'm a Student</a>
                    <a href="#" class="btn btn-outline-light">I'm a Teacher</a>
                </div>
            </div>

            <!-- Right Image -->
            <div>
                <img src="{{ asset('image/Model.png') }}" alt="EduNext Model" style="max-width: 90%; height: auto;">
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="py-5 bg-white">
        <div class="container d-flex flex-wrap justify-content-center text-center">
            <div class="p-4" style="min-width: 150px;">
                <h2 style="color: #1d76bc;">5K<span style="color: #49bbbd;">+</span></h2>
                <p>Students Enrolled</p>
            </div>
            <div class="p-4" style="min-width: 150px;">
                <h2 style="color: #49bbbd;">85%</h2>
                <p>Student Success Rate</p>
            </div>
            <div class="p-4" style="min-width: 150px;">
                <h2 style="color: #1d76bc;">5<span style="color: #49bbbd;">+</span></h2>
                <p>Subjects Offered</p>
            </div>
            <div class="p-4" style="min-width: 150px;">
                <h2 style="color: #1d76bc;">30<span style="color: #49bbbd;">+</span></h2>
                <p>Expert Lecturers</p>
            </div>
            <div class="p-4" style="min-width: 150px;">
                <h2 style="color: #49bbbd;">10</h2>
                <p>Years of Excellence</p>
            </div>
        </div>
    </div>
    <!-- Why Choose EduNext Section -->
    <div class="py-5 bg-white text-center">
        <div class="container">
            <!-- Title -->
            <h2 class="mb-3" style="font-weight: 700;">
                <span style="color: #2c2c6c;"> Why Choose</span> <span style="color: #49bbbd;">EduNext?</span>
            </h2>

            <!-- Description -->
            <p class="mb-5" style="max-width: 700px; margin: 0 auto; color: #4a4a4a;">
                EduNext is a tuition center platform that empowers lecturers to create interactive courses and quizzes,
                while students can enroll in subjects, access learning materials, and test their knowledge—all in one place.
            </p>

            <!-- Image Cards -->
            <div class="row justify-content-center g-4">
                <!-- Teacher Card -->
                <div class="col-md-5">
                    <div class="position-relative rounded overflow-hidden" style="cursor: pointer;">
                        <img src="{{ asset('image/Teachers.png') }}" alt="For Teachers" class="img-fluid w-100"
                            style="border-radius: 15px;">

                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white text-center"
                            style="backdrop-filter: brightness(0.5); padding: 20px;">
                            <h5 class="fw-bold">FOR TEACHERS</h5>
                            <button class="btn btn-outline-light mt-2">Create Your Course Today</button>
                        </div>
                    </div>
                </div>
                <!-- Student Card -->
                <div class="col-md-5">
                    <div class="position-relative rounded overflow-hidden" style="cursor: pointer;">
                        <img src="{{ asset('image/Students.png') }}" alt="For Students" class="img-fluid w-100"
                            style="border-radius: 15px;">

                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white text-center"
                            style="backdrop-filter: brightness(0.5); padding: 20px;">
                            <h5 class="fw-bold">FOR STUDENTS</h5>
                            <button class="btn" style="background-color: #49bbbd; color: white;">Enroll in a Subject
                                Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Discover Features Section -->
    <div class="py-5 bg-white text-center">
        <div class="container">
            <!-- Section Title -->
            <h2 class="mb-3">
                <span style="color: #2c2c6c; font-weight: bold;">Discover</span>
                <span style="color: #49bbbd; font-weight: bold;">EduNext’s</span>
                <span style="color: #2c2c6c; font-weight: bold;">Features</span>
            </h2>

            <!-- Subtitle -->
            <p class="mb-5" style="max-width: 700px; margin: 0 auto; color: #4a4a4a;">
                EduNext offers powerful tools to enhance learning and teaching for students and lecturers alike.
            </p>

            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 mb-4 mb-md-0 position-relative">
                    <img src="{{ asset('image/Subject Enrollment for Students.png') }}" alt="Subject Enrollment"
                        class="img-fluid rounded" style="width: 70%; height: auto;">
                    <div
                        style="width: 60px; height: 60px; background-color: #49bbbd; border-radius: 50%; position: absolute; top: -20px; left: -20px;">
                    </div>
                    <div
                        style="width: 15px; height: 15px; background-color: #3cc9d2; border-radius: 50%; position: absolute; top: 40px; left: 10px;">
                    </div>
                    <div
                        style="width: 100px; height: 100px; background-color: #2c2c6c; border-radius: 50%; position: absolute; bottom: -30px; right: -30px;">
                    </div>
                    <div
                        style="width: 40px; height: 40px; background-color: #f75f48; border-radius: 50%; position: absolute; bottom: -10px; right: 50px;">
                    </div>
                </div>

                <div class="col-md-5 text-start">
                    <h4>
                        <span style="color: #49bbbd; font-weight: 600;">Subject Enrollment</span>
                        <span style="color: #2c2c6c; font-weight: 600;">for Students</span>
                    </h4>
                    <p style="color: #4a4a4a;">
                        Teachers don’t get lost in the grid view and have a dedicated Podium space.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-white text-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5 text-md-end mb-4 mb-md-0">
                    <h4 class="mb-2">
                        <span style="color: #49bbbd; font-weight: 600;">Course Creation</span><br>
                        <span style="color: #2c2c6c; font-weight: 600;">for Lecturers</span>
                    </h4>
                    <p style="color: #4a4a4a; max-width: 400px; margin-left: auto;">
                        Lecturers can create and manage interactive courses, uploading topics and materials to support
                        student learning.
                    </p>
                </div>

                <!-- Image -->
                <div class="col-md-6" style="margin-left: 100px;">
                    <img src="{{ asset('image/Course Creation for Lecturers.jpg') }}" alt="Course Creation"
                        class="img-fluid rounded" style="width: 70%; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-white text-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- Image -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('image/Interactive Quizzes.png') }}" alt="Interactive Quizzes"
                        class="img-fluid rounded" style="width: 70%; height: auto;">
                </div>

                <!-- Text Content -->
                <div class="col-md-5 text-md-start text-center">
                    <h4 class="mb-2">
                        <span style="color: #2c2c6c; font-weight: 600;">Interactive</span><br>
                        <span style="color: #49bbbd; font-weight: 600;">Quizzes</span>
                    </h4>
                    <p style="color: #4a4a4a; max-width: 400px; margin: 0 auto 0 0;">
                        Lecturers can set quizzes to test student knowledge, and students can take them anytime,
                        with results tracked for progress.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-white text-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- Text Content -->
                <div class="col-md-5 text-md-end mb-4 mb-md-0">
                    <h4 class="mb-2">
                        <span style="color: #49bbbd; font-weight: 600;">Profile</span><br>
                        <span style="color: #2c2c6c; font-weight: 600;">Management</span>
                    </h4>
                    <p style="color: #4a4a4a; max-width: 400px; margin-left: auto;">
                        Both lecturers and students can manage their profiles, updating personal details and
                        tracking their activity on the platform.
                    </p>
                </div>

                <!-- Image -->
                <div class="col-md-6" style="margin-left: 100px;">
                    <img src="{{ asset('image/Profile.png') }}" alt="Profile Management" class="img-fluid rounded"
                        style="width: 70%; height: auto;">
                    >
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-white text-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- Image -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('image/Session Tracking.jpg') }}" alt="Session Tracking" class="img-fluid rounded"
                        style="width: 70%; height: auto;">
                    >
                </div>

                <!-- Text Content -->
                <div class="col-md-5 text-md-start text-center">
                    <h4 class="mb-2">
                        <span style="color: #2c2c6c; font-weight: 600;">Session</span><br>
                        <span style="color: #49bbbd; font-weight: 600;">Tracking</span>
                    </h4>
                    <p style="color: #4a4a4a; max-width: 400px; margin: 0 auto 0 0;">
                        Track your recent activity, such as the last quiz taken or course created, to stay organized and
                        focused.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-white text-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- Text Content -->
                <div class="col-md-5 text-md-start text-center mb-4 mb-md-0">
                    <small class="text-uppercase" style="color: #2c2c6c; letter-spacing: 1px;">Testimonial</small>
                    <h4 class="mb-3" style="color: #2c2c6c; font-weight: 700;">
                        What Our Students Say
                    </h4>
                    <p style="color: #4a4a4a;">
                        EduNext has received thousands of positive reviews from students and lecturers.
                        Many have improved their learning and teaching experience with our platform.
                    </p>
                    <p style="color: #4a4a4a;">
                        Join them! Share your experience with EduNext
                        <br>
                        Are you too? Please give your assessment
                    </p>
                </div>

                <!-- Image + Review Box -->
                <div class="col-md-6 position-relative">
                    <img src="{{ asset('image/Review.png') }}" alt="Student Review" class="img-fluid rounded"
                        style="width: 70%; height: auto;">
                    >
                </div>
            </div>
        </div>
    </div>
@endsection