@extends('admin.layout.app')

@section('title', 'Users')

@section('content')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>WhatsApp</th>
                                        <th>Create at</th>
                                        <th>Status</th> <!-- Status column -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone ? $user->phone : 'N/A' }}</td>
                                        <td>
                                            @if ($user->whatsapp_account == 'yes') 
                                                <span class="text-success">Yes</span>
                                            @else
                                                <span class="text-danger">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $user->is_active ? 'btn-success' : 'btn-danger' }}" 
                                                    onclick="toggleUserStatus({{ $user->id }})">
                                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
<script>
    function toggleUserStatus(userId) {
        const button = event.target;
        const isActive = button.textContent.trim() === 'Active';
        const newStatus = isActive ? 0 : 1; // 0 for inactive, 1 for active

        // AJAX request to update the user's status
        fetch(`/users/${userId}/status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for security
            },
            body: JSON.stringify({ is_active: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update button text and class
                button.textContent = isActive ? 'Inactive' : 'Active';
                button.classList.toggle('btn-success');
                button.classList.toggle('btn-danger');
            } else {
                alert('Error updating status!');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection
