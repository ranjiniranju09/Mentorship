@extends('layouts.new_mentee')

@section('content')
@if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            
        </div>


        <div class="col-md-9">
            
            @foreach($chapters as $chapter)
            <div class="card mb-4">
                <div class="card-header primary">
                    <!-- Content goes here -->
                    
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $chapter->chaptername }}</h5>

                    <hr style="height: 2px;">
                    <p class="card-text">{{ $chapter->description }}</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('subchaptercontent',['chapter_id' => $chapter->id]) }}" class="btn btn-primary">Get Started</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('viewquiz',['chapter_id' => $chapter->id]) }}" class="btn btn-primary">Start Quiz</a>
                        </div>
                    </div>
                    


                </div>


            </div>
           
            @endforeach
            

            
        </div>
    </div>
</div>

<style type="text/css">
.card-header {
    padding: 10px;
    color: #ffffff; /* Text color */
}

.primary {
    background-color: #007bff; /* Bootstrap primary color */
}

.danger {
    background-color: #dc3545; /* Bootstrap danger color */
}

.custom-color {
    background-color: #your_custom_color; /* Your custom color */
}
</style>
@endsection

@section('scripts')

@endsection
