<x-app title="Create Organization">
    <h1 class="fw-bold mb-4">Create New Organization</h1>

    <form action="{{ route('organization.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Company</label>
            <input type="text" name="company" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lecture</label>
            <select name="lecture_id" class="form-select" required>
                <option value="">Pilih Lecturer</option>
                @foreach ($lectures as $lecture)
                    <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('organization.index') }}" class="btn btn-warning">Cancel</a>
    </form>
</x-app>
