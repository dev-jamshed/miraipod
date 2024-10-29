@extends('admin.layout.app')

@section('title', 'Inquiries')

@section('content')

@include('admin.message')

<style>
 img.inq-car-img {
    width: 150px;
    display: inline-block;
}
.reply {
    background-color: #f8f9fa;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
}
</style>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Inquiries</h4>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Car Name</th>
                                        <th>Phone</th>
                                        <th>Whatsapp</th>
                                        <th>Message</th>
                                        <th>Created At</th>
                                        <th class="text-center">Car</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inquiries as $inquiry)
                                    <tr>
                                        <td class="text-center">{{ $inquiry->id }}</td>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->car_name }}</td>
                                        <td>{{ $inquiry->phone }}</td>
                                        <td>{{ $inquiry->is_whatsapp }}</td>
                                        <td>{{ $inquiry->Message }}</td>
                                        <td>{{ $inquiry->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('car.show',['id' => $inquiry->car->id]) }}">
                                                @php $thumbnail = $inquiry->car->carImages->first() @endphp
                                                <img class="inq-car-img" src="{{ asset('images/car') }}/{{ $thumbnail->image }}" />
                                            </a>
                                        </td>
                                        <td class="action-btns">
                                            <button class="btn btn-primary reply-btn" data-id="{{ $inquiry->id }}">Reply</button>
                                            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this inquiry?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="9">
                                            <div class="replies">
                                               @foreach($inquiry->replies as $reply)
                                                    <div class="reply">
                                                        <strong>{{ $reply->user->name }}:</strong>
                                                        <p>{{ $reply->message }}</p>
                                                        <small>Replied on {{ $reply->created_at->format('d M Y, H:i') }}</small>
                                                    </div>
                                                @endforeach
                                            </div>
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
 
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    
    $(document).ready(function() {
    
    $('#tableExport').DataTable().destroy();

    // Initialize DataTable
    var table = $('#tableExport').DataTable({
        // Set default order to descending by ID
        "order": [[0, "desc"]],
        
        // Add dom property for custom filters
             dom: '<"row"<"col-sm-3"l><"col-sm-9 display_flex"Bf>>' + 
             '<"row"<"col-sm-12"tr>>' + 
             '<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        // Add length menu options: 10, 20, 50 rows
        "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],  // -1 means "All"
        "pageLength": 10  // Default number of rows per page
    });

    // Date range filtering
    $('#minDate, #maxDate').change(function() {
        table.draw();
    });
 
     
    
    
});



  
    $(document).ready(function() {
        $('.reply-btn').on('click', function() {
            const inquiryId = $(this).data('id');

            Swal.fire({
                title: 'Reply to Inquiry',
                input: 'textarea',
                inputLabel: 'Your Reply',
                inputPlaceholder: 'Type your reply here...',
                showCancelButton: true,
                confirmButtonText: 'Send',
                cancelButtonText: 'Cancel',
                preConfirm: (reply) => {
                    if (!reply) {
                        Swal.showValidationMessage('Please enter a reply');
                        return false; // Prevent form submission
                    } else {
                        // AJAX request to send the reply
                        return $.ajax({
                            url: `/inquiry/${inquiryId}/reply`, // Adjust the URL according to your route
                            type: 'POST',
                            data: {
                                reply: reply,
                                _token: '{{ csrf_token() }}' // CSRF token for Laravel
                            }
                        }).then(response => {
                            Swal.fire('Sent!', response.message, 'success');
                        }).catch(error => {
                            Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                        });
                    }
                }
            });
        });
    });


    
</script>
 

@endsection
