@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Resource Approvals</h1>
    <table class="table table-bordered resource-table">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Link</th>
                <th>Type</th>
                <th>Module</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($approvals as $approval)
            <tr>
                <td>{{ $approval->id }}</td>
                <td>{{ $approval->title }}</td>
                <td>{{ $approval->description }}</td>
                <td>
                    @if($approval->file_path)
                        <a href="{{ $approval->file_path }}" target="_blank">{{ $approval->file_path }}</a>
                    @else
                        No Link
                    @endif
                </td>
                <td>{{ ucfirst($approval->type) }}</td>
                <td>{{ $approval->module_name ?? 'N/A' }}</td>
                <td>
                    <form action="{{ route('resource_approvals.approve', $approval->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn @if($approval->is_approved) btn-secondary @else btn-success @endif" 
                                @if($approval->is_approved) disabled @endif>
                            Approve
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>



@endsection
