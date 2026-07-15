<x-app title="Create Student">
    <h1 class="fw-bold mb-4">Create New Student</h1>

    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('student.index') }}" class="btn btn-warning">Cancel</a>
    </form>
</x-app>
