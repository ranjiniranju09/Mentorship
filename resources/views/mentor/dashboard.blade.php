@extends('layouts.mentor')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

        * {
            font-family: "Ubuntu", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #2a2185;
            --white: #fff;
            --gray: #f5f5f5;
            --black1: #222;
            --black2: #999;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
            background: var(--white);
        }

        .container {
            position: relative;
            width: 100%;
            margin: 0;
        }

        .topbar {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            background: var(--white);
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
        }

        .toggle {
            font-size: 1.5rem;
            cursor: pointer;
        }

        .search {
            width: 400px;
            position: relative;
        }

        .search input {
            width: 100%;
            height: 40px;
            border-radius: 20px;
            padding: 0 20px;
            padding-left: 40px;
            font-size: 16px;
            border: 1px solid var(--black2);
            outline: none;
        }

        .cardBox {
            display: grid;
            justify-content: space-around;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 15px;
        }

        .card {
            background: var(--white);
            height: 180px;
            width: 200px;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s;
        }
        a {
            text-decoration: none;
        }
       
        .card:hover {
            background: var(--black1);
        }

        .card:hover .numbers,
        .card:hover .cardName,
        .card:hover .iconBx {
            color: var(--white);
        }
      

        .numbers {
            align-items: center;
            font-size: 2rem;
            font-weight: 500;
            color: var(--black1);
        }

        .cardName {
            font-size: 1rem;
            color: var(--black2);
        }

        .iconBx {
            font-size: 2rem;
            color: var(--black2);
        }
       


        @media (max-width: 768px) {
            .main {
                margin-left: 0;
            }

            .main.active {
                margin-left: 300px;
            }
        }

        @media (max-width: 480px) {
            .main.active .toggle {
                color: #fff;
                position: fixed;
                right: 0;
                left: initial;
            }
        }
    </style>

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h2 class="mb-4">Welcome Mentor</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-info text-white">Total Sessions Conducted</div>
                                <div class="card-body">
                                    <h4 class="font-weight-bold">{{ $totalSessions }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header bg-success text-white">Total Minutes Mentored</div>
                                <div class="card-body">
                                    <h4 class="font-weight-bold">{{ $totalMinutesMentored }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mentorship Meetings</div>
                <div class="card-body">
                   <table class="table table-striped ">
                       <thead>
                           <th scope="col">Module Name</th>
                           <th scope="col">Status</th>
                           <th scope="col">Date</th>
                           <th scope="col">Action</th>
                           <th>Recording</th>
                       </thead>
                       <tbody>
                        @foreach($modules as $module)
                        <tr>
                            <td>{{ $module->name }}</td>
                            <td>
                                @if(isset($sessions[$module->id]) && count($sessions[$module->id]) > 0)
                                    @foreach($sessions[$module->id] as $session)
                                        @if(($session->done)==='Yes')
                                            <span class="badge badge-success">Done</span>
                                        @elseif(!empty($session->sessiondatetime) && empty($session->done))
                                            <span class="badge badge-primary">Scheduled</span>
                                        @else
                                            <span class="badge badge-dark">Not Scheduled</span>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="badge badge-dark">Not Scheduled</span>
                                @endif
                            </td>
                            <td>
                                @if(isset($sessions[$module->id]) && count($sessions[$module->id]) > 0)
                                    @foreach($sessions[$module->id] as $session)
                                        {{ $session->sessiondatetime }}<br>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if(isset($sessions[$module->id]) && count($sessions[$module->id]) > 0)
                                    @foreach($sessions[$module->id] as $session)

                                        @if(isset($session->done))

                                        @else
                                        <a href="{{ $session->sessionlink }}" target="_blank" class="btn btn-xs btn-primary">Join Session</a><br>
                                        @endif
                                            
                                        @endforeach
                                @endif

                                @if(isset($sessions[$module->id]) && count($sessions[$module->id]) > 0)
                                    @foreach($sessions[$module->id] as $session)
                                    @if(!isset($session->done))
            <form action="{{ route('sessions.mark-as-done', ['id' => $session->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-xs btn-primary">Mark as Done</button>
            </form>
            <br>
        @endif
                                    @endforeach

                                @endif
                            </td>
                            <td>
                                @if(isset($sessions[$module->id]) && count($sessions[$module->id]) > 0)
                                    @foreach($sessions[$module->id] as $session)
                                        @if($session->done==='Yes')
                                    
                                            <a href="" target="_blank" ><i class="fas fa-video"></i> </a>
                                            <br>
                                        @else
                                        @endif
                                    @endforeach
                                @else
                                    
                                @endif
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
--}}

<div class="container">
    <div class="cardBox">
            <a href="{{route('moduleList')}}" target="_blank">
                <div class="card">
                <span>
                    <div>
                        <div class="numbers">5</div>
                        <div class="cardName">Modules Completed</div>
                    </div>
                </span>

                    <div class="iconBx">
                    <i class=" icon fa-solid fa-diagram-project"></i>
                    </div>
                </div>
            </a>

            <a href="{{route('quizdetails')}}" target="_blank">
              <div class="card">
                  <div>
                      <div class="numbers">4</div>
                      <div class="cardName">Total Quiz</div>
                  </div>

                  <div class="iconBx">
                  <i class="fa-regular fa-circle-question"></i>
                  </div>
              </div>
            </a>

            <a href="{{route('tasks.index')}}" target="_blank">
                <div class="card">
                    <div>
                        <div class="numbers">6</div>
                        <div class="cardName">Task Completed</div>
                    </div>

                    <div class="iconBx">
                    <i class="fa-solid fa-list"></i>
                    </div>
                </div>
            </a>
            <a href="{{route('sessions.index')}}" target="_blank">
                <div class="card">
                    <div>
                        <div class="numbers">6</div>
                        <div class="cardName">Total Session Completed </div>
                    </div>

                    <div class="iconBx">
                    <i class="fa-solid fa-users"></i>
                    </div>
                </div>
            </a>
            <div class="card">
                <div>
                    <div class="numbers">60 mins</div>
                    <div class="cardName">Total Minutes Mentored </div>
                </div>

                <div class="iconBx">
                  <i class="fa-solid fa-clock"></i>
                </div>
            </div>
            <a href="{{route('resources.index')}}" target="_blank">
                <div class="card">
                    <div>
                        <div class="numbers">5</div>
                        <div class="cardName">Total Resources </div>
                    </div>

                    <div class="iconBx">
                        <i class="fa-solid fa-link"></i>
                    </div>
                </div>
            </a>
            <a href="{{route('opportunity.index')}}" target="_blank">
                <div class="card">
                    <div>
                        <div class="numbers">10</div>
                        <div class="cardName">Opportunities</div>
                    </div>

                    <div class="iconBx">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                </div>
            </a>
        </div>

</div>

   

@endsection
