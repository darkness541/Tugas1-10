<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'UNITEMA' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">UNITAMA</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('student.index') }}">Student</a>
                <a class="nav-link" href="{{ route('department.index') }}">Department</a>
                <a class="nav-link" href="{{ route('lecture.index') }}">Lecturer</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        {{ $slot }}
    </div>

</body>

</html>
