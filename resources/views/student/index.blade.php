<x-app title="Student">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Student Data</h1>
        <a href="{{ route('student.create') }}" class="btn btn-primary">+ Create</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>NIM</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $loop->iteration + ($students->currentPage() - 1) * $students->perPage() }}</td>
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
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Belum ada data student</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($students->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p class="mb-0">Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of
                {{ $students->total() }} results</p>
            {{ $students->links() }}
        </div>
    @endif
</x-app>
