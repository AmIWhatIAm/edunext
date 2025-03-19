<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>All Events</h1>

    <div class="container">

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Location</th>
                    <th>Notification</th>
                    <th>Email</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->start_time }}</td>
                    <td>{{ $event->end_time }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->notification }}</td>
                    <td>{{ $event->email }}</td>
                    <td>{{ $event->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
