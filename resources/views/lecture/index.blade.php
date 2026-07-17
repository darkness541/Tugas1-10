<x-app title="Lecturer">
    <h1 class="fw-bold mb-4">Lecturer</h1>

    <!-- Search & Filter -->
    <form action="{{ route('lecture.index') }}" method="GET" class="mb-4">
        <div class="row g-3">
            <div class="col-md-5">
                <input type="text" name="keyword" class="form-control" placeholder="Search lecturer name ..."
                    value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <select name="department_id" class="form-select">
                    <option value="">All Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ request('department_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success w-100">Search</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lectures as $lecture)
                <tr>
                    <td>{{ $loop->iteration + ($lectures->currentPage() - 1) * $lectures->perPage() }}</td>
                    <td>{{ $lecture->name }}</td>
                    <td>{{ $lecture->department->name ?? '-' }}</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">No data found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <p class="mb-0">Showing {{ $lectures->firstItem() ?? 0 }} to {{ $lectures->lastItem() ?? 0 }} of
            {{ $lectures->total() ?? 0 }} results</p>
        {{ $lectures->links() }}
    </div>
</x-app>
