@extends('layouts.new_mentee')

@section('content')

<style>
    .container {
        margin-top: 30px;
        margin-left: 20%;
        width : auto;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .header h2 {
        font-size: 2rem;
        color: #343a40;
    }
    .header .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 16px;
        font-weight: bold;
    }
    .header .btn:hover {
        background-color: #0056b3;
    }
    .filter {
        margin-bottom: 20px;
    }
    .table-responsive {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    .table thead th {
        background-color: #007bff;
        color: #fff;
        border: none;
    }
    .table tbody tr {
        transition: background-color 0.3s;
    }
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    .table tbody td {
        border: none;
    }
    .status-badge {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
    }
    .status-open {
        background-color: #28a745;
        color: #fff;
    }
    .status-closed {
        background-color: #dc3545;
        color: #fff;
    }
    .status-pending {
        background-color: #ffc107;
        color: #212529;
    }
</style>

<div class="container">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<span>
    <div class="ticket-table-section">
        <h4>Ticket Details</h4><a href="#" class="btn btn-success" data-toggle="modal" data-target="#newTicketModal">New Ticket</a>   
    </div>
    <br>
    
</span>
<div class="ticket-table-section">
    <table class="table table-bordered ticket-table">
        <thead class="table-dark">
            <tr>
                <th>Ticket Id</th>
                <th>User Email</th>
                <th>Category</th>
                <th>Description</th>
                <th>Status</th>
                <th>Attachment</th> <!-- Add a column for attachments -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->user_email }}</td>
                    <td>{{ $ticket->category_description }}</td> 
                    <td>{{ $ticket->ticket_description }}</td>
                    <td>{{ $ticket->status == 1 ? 'Open' : 'Closed' }}</td> <!-- Assuming 1 is for open and 0 is for closed -->
                    <td>
                        @if ($ticket->file_path)
                            <a href="{{ $ticket->file_path }}" target="_blank">View Attachment</a>
                        @else
                            No attachment
                        @endif
                    </td>
                    <td>
                        <!-- Actions such as view, edit, delete buttons -->
                        <!-- <a href="#" class="btn btn-secondary" onclick="openEditModal({{ json_encode($ticket) }})">Edit</a> -->
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No tickets found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- New Ticket Modal -->
<div class="modal fade" id="newTicketModal" tabindex="-1" role="dialog" aria-labelledby="newTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTicketModalLabel">New Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="newTicketForm" method="POST" action="{{ route('mentee.tickets.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="user_email">User Email</label>
                    <input type="text" class="form-control" id="user_email" value="{{ Auth::user()->email }}" disabled>
                    <input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
                </div>

                <div class="form-group">
                    <label for="ticket_category_id">Category</label>
                    <select class="form-control" id="ticket_category_id" name="ticket_category_id">
                        <option value="">---Select---</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="ticket_description">Description</label>
                    <textarea class="form-control" id="ticket_description" name="ticket_description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="attachment">Attachment</label>
                    <input type="file" class="form-control" id="attachment" name="attachment" multiple> <!-- Allow multiple files -->
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            </div>
        </div>
    </div>
</div>

<!-- Edit Ticket Modal -->
<div class="modal fade" id="editTicketModal" tabindex="-1" role="dialog" aria-labelledby="editTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTicketModalLabel">Edit Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTicketForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="edit_user_email">User Email</label>
                        <input type="text" class="form-control" id="edit_user_email" name="user_email" value="{{ Auth::user()->email }}" disabled>
                        <input type="hidden" id="edit_ticket_id" name="ticket_id">
                    </div>

                    <div class="form-group">
                        <label for="edit_ticket_category_id">Category</label>
                        <select class="form-control" id="edit_ticket_category_id" name="ticket_category_id">
                            <option value="">---Select---</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_ticket_description">Description</label>
                        <textarea class="form-control" id="edit_ticket_description" name="ticket_description" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="edit_files">Attachment</label>
                        <input type="file" class="form-control" id="edit_files" name="files[]" multiple> <!-- Allow multiple files -->
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- <script>
     function openEditModal(ticket) {
        $('#editTicketForm').attr('action', `/mentee/tickets/${ticket.id}`);
        $('#edit_ticket_id').val(ticket.id);
        $('#edit_ticket_category_id').val(ticket.ticket_category_id);
        $('#edit_ticket_description').val(ticket.ticket_description);
        $('#editTicketModal').modal('show');
    }
</script> -->
@endsection
