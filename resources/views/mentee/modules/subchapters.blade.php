@extends('layouts.new_mentee')

@section('content')

<style>
    /* Custom CSS styles for a professional look */
    .container {
        margin-top: 30px;
    }
    .list-group-item {
        background-color: #f8f9fa;
        border: none;
        border-left: 4px solid transparent;
        color: #007bff;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .list-group-item:hover, .list-group-item.active {
        background-color: #007bff;
        color: #fff;
        border-left: 4px solid #0056b3;
    }
    .scrollspy-example {
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-height: 80vh;
        overflow-y: auto;
    }
    .scrollspy-example h4 {
        margin-top: 30px;
        font-size: 1.5rem;
        color: #343a40;
    }
    .scrollspy-example p {
        font-size: 1rem;
        color: #555;
        line-height: 1.6;
    }
    .nav-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .nav-buttons .btn {
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
    .nav-buttons .btn:hover {
        background-color: #0056b3;
    }
</style>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div id="list-example" class="list-group">
                @foreach($subchapters as $subchapter)
                    <a class="list-group-item list-group-item-action" href="#list-item-{{ $subchapter->id }}">{{ $subchapter->title }}</a>
                @endforeach
                <a class="list-group-item list-group-item-action" href="#list-item-resources">Resource List</a>
            </div>
        </div>
        <div class="col-md-8">
            <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                @foreach($subchapters as $subchapter)
                    <h4 id="list-item-{{ $subchapter->id }}">{{ $subchapter->title }}</h4>
                    <p>{!! $subchapter->content !!}</p>
                @endforeach
                
                <h4 id="list-item-resources">Resource List</h4>
                <ul>
                    @foreach($moduleresources as $resource)
                        <li>
                            <strong>Title:</strong> {{ $resource->title }}<br>
                            <strong>Link:</strong> <a href="{{ $resource->link }}">{{ $resource->link }}</a><br>
                            <strong>Descriptive Material:</strong> {{ $resource->descriptivematerial }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div> 
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Optional JavaScript for additional functionality
</script>
@endsection
