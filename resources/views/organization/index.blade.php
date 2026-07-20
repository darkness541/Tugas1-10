<x-app title="Organization">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Organization</h1>
        <a href="{{ route('organization.create') }}" class="btn btn-primary">+ Create</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Company</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($organizations as $organization)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $organization->name }}</td>
                    <td>{{ $organization->company }}</td>
                    <td>
                        <a href="{{ route('organization.edit', $organization) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('organization.destroy', $organization) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">No data found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app>
