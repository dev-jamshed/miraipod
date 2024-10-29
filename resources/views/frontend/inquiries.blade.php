@extends('frontend.layouts.master_layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/inquiry.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .reply-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-top: 10px;
            background-color: #f9f9f9;
            position: relative;
        }

        .reply-card::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 10px;
            background-color: #e0e0e0;
            bottom: -5px;
            left: 0;
        }

        .reply-author {
            font-weight: bold;
        }

        .reply-date {
            font-size: 0.9em;
            color: #888;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="heading-header" style="padding-left:10px">
            <h2>My Inquiries</h2>
        </div>

        <main>
            <table style="text-align:center; width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Car Name</th>
                        <th>Message</th>
                        <th>Created Date</th>
                        <th>Car</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inquiries->sortByDesc('created_at') as $inquiry)
                        <tr>
                            <td data-label="ID">{{ $inquiry->id }}</td>
                            <td data-label="Name">{{ $inquiry->name }}</td>
                            <td data-label="Email">{{ $inquiry->email }}</td>
                            <td data-label="Phone">{{ $inquiry->phone }}</td>
                            <td data-label="Car Name">{{ $inquiry->car_name }}</td>
                            <td data-label="Message">{{ $inquiry->Message }}</td>
                            <td data-label="Created Date">{{ $inquiry->created_at->format('d M Y') }}</td>
                            <td data-label="Car">
                                <a href="{{ route('car.show', ['id' => $inquiry->car->id]) }}">
                                    @php $thumbnail = $inquiry->car->carImages->first() @endphp
                                    <img class="inq-car-img" src="{{ asset('images/car') }}/{{ $thumbnail->image }}" />
                                </a>
                            </td>
                            <td data-label="Action">
                                <button class="btn btn-primary reply-btn" data-id="{{ $inquiry->id }}">Reply</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9" style="text-align:left; padding: 10px;">
                                @if ($inquiry->replies->count() > 0)
                                    @foreach ($inquiry->replies as $reply)
                                        <div class="reply-card">
                                            <div class="reply-author">{{ $reply->user->name }}</div>
                                            <div class="reply-message">{{ $reply->message }}</div>
                                            <div class="reply-date">{{ $reply->created_at->format('d M Y H:i') }}</div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="reply-card">
                                        <div class="reply-message">No replies yet.</div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        jQuery(document).ready(function($) {
            const replyButtons = $('.reply-btn');

            replyButtons.each(function() {
                $(this).on('click', function() {
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
                                return false;
                            } else {
                                return $.ajax({
                                    url: `/inquiry/${inquiryId}/reply`,
                                    type: 'POST',
                                    data: {
                                        reply: reply,
                                        _token: '{{ csrf_token() }}'
                                    }
                                }).then(response => {
                                    Swal.fire('Sent!', response.message,
                                        'success');
                                    location.reload();
                                }).catch(error => {
                                    Swal.fire('Error!',
                                        'Something went wrong. Please try again.',
                                        'error');
                                });
                            }
                        }
                    });
                });
            });
        });
    </script>
@endsection
