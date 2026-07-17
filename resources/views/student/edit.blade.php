<x-app title="Edit Student">
    <h1 class="fw-bold mb-4">Edit Student</h1>

    <form action="{{ route('student.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim', $student->nim) }}" required>
            @error('nim')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Department</label>
            <select name="department_id" class="form-select" required>
                <option value="">Pilih Department</option>
                @foreach (\App\Models\Department::all() as $dept)
                    <option value="{{ $dept->id }}"
                        {{ old('department_id', $student->department_id) == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('student.index') }}" class="btn btn-warning">Cancel</a>
    </form>
</x-app>
