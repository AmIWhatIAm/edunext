<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Page</title>

    <!-- Link Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container">
        {{-- <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Change Simplification</h2>
            <ul class="lesson-list">
                @for ($i = 0; $i < 5; $i++)
                <li class="lesson">
                    <span class="lesson-title">Lesson 01: Introduction about XD</span>
                    <span class="lesson-time">30 mins</span>
                </li>
                @endfor
            </ul>

            <h2>Practice Quiz</h2>
            <ul class="lesson-list">
                @for ($i = 0; $i < 5; $i++)
                <li class="lesson">
                    <span class="lesson-title">Lesson 01: Introduction about XD</span>
                    <span class="lesson-time">30 mins</span>
                </li>
                @endfor
            </ul>
        </aside> --}}

        <!-- Main Content -->
        <main class="content">
            <div class="header">
                <h1>Learn about Adobe XD & Prototyping</h1>
                <p>Introduction about XD</p>
                <span class="time">⏳ 1 hour</span>
            </div>

            <div class="event-form">
                <h2>Create new event</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>

                <form action="{{ route('event.store') }}" method="POST">
                    @csrf
                    <label>Event Name</label>
                    <input type="text" name="name" required>
                
                    <div class="row">
                        <div>
                            <label>Start date / Time</label>
                            <input type="datetime-local" name="start_time" required>
                        </div>
                        <div>
                            <label>End Date / Time</label>
                            <input type="datetime-local" name="end_time">
                        </div>
                    </div>
                
                    <label>Location</label>
                    <input type="text" name="location">
                
                    <div class="row">
                        <div>
                            <label>Notification</label>
                            <select name="notification">
                                <option value="30 mins">30 mins</option>
                                <option value="1 hour">1 hour</option>
                            </select>
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" name="email">
                        </div>
                    </div>
                
                    <label>Event Description</label>
                    <textarea name="description"></textarea>
                
                    <button type="submit">Save Now</button>
                </form>
                
            </div>
        </main>
    </div>

</body>
</html>
