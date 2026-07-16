<x-app title="Student">
    <div class="d-flex justify-content-between mb-3">
        <h1 class="fw-bold">Student Data</h1>
        <a href="{{ route('student.create') }}" class="btn btn-primary">+ Create</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>NIM</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->department->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('student.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('student.destroy', $student) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app>
