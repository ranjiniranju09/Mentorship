@extends('layouts.new_mentee')
@section('content')


<style type="text/css">
    .content {
        padding: 10px;
        /* Align the content to the right side */
        float: right;
        width: 95%; /* Adjust the width as needed */
    }
    .module-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
        }
    .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
    .module-title {
            color: #007bff;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .module-name {
            color: #555;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .module-description {
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .module-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .action-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            font-weight: bold;
        }
        .action-btn:hover {
            background-color: #0056b3;
        }

</style>
<center><h1>Modules</h1></center>
<hr>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <!-- Modules -->
                    <div class="container mt-3">
                        <h1 class="page-title">Explore Modules</h1>
                        <br>
                        <div class="row">
                            @foreach($modules as $module)
                            <div class="col-md-4">
                                <div class="module-card">
                                    {{-- <a href="" class="module-title" target="_blank">{{$module->title ?? ''}}</a> --}}
                                    <h2 class="module-name">{{$module->name ?? ''}}</h2>
                                    <p class="module-description">{{$module->description ?? ''}}</p>
                                    <div class="module-action">
                                        <a href="{{ route('chapterscontent',['module_id' => $module->id]) }}" class="action-btn" target="_blank">Explore</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
@endsection