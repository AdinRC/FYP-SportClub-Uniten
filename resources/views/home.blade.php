@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center"> --}}
            {{-- <div class="col-md-8"> --}}
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('isAdmin')
                    <div style="display: grid;
                    grid-template-columns: 3fr 1fr;
                    grid-column-gap: 20px;
                    grid-row-gap: 20px;">
                            <div>
                                <h1><b>Event Overview</b> </h1>
                                <div class="card">
                                    <div class="card-body" >
                                        <div  class="text-center">
                                            <img src="imgevent/mlbb.jpg" alt="mlbb" >
                                            <img src="imgevent/bola_sepak.jpg" alt="bola sepak" >
                                            <img src="imgevent/sepak_takraw.jpeg" alt="sepak takraw">
                                        </div>
                                        <br>
                                        <a class="btn btn-primary" href="/AdminManage/event">View All Event</a>
                                    </div>
                                </div>
                            </div>
                            <div style="grid-row: auto / span 2;">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="text-center">Calendar</h4>
                                        <div class="container">
                                            <div id="dycalendar"></div>
                                        </div>
                                        <br><br><br><br><br>
                                    </div>
                                </div>
                            </div>
                            <div  style="display: grid;
                                        grid-template-columns: 1fr 1fr;
                                        grid-column-gap: 20px;
                                        grid-row-gap: 20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center">Total Club</h4>
                                        <h4 class="text-center"><b>23</b></h4>
                                    </div>  
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center">User Online</h4>
                                        <h4 class="text-center"><b>60</b></h4>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    @endcan

                    @can('isUser')
                    <div style="display: grid;
                                grid-template-columns: 3fr 1fr;
                                grid-column-gap: 20px;
                                grid-row-gap: 20px;">
                        <div>
                            <h1><b>Event Overview</b> </h1>
                            <div class="card">
                                <div class="card-body" >
                                    <div  class="text-center">
                                        <img src="imgevent/mlbb.jpg" alt="mlbb" >
                                        <img src="imgevent/bola_sepak.jpg" alt="bola sepak" >
                                        <img src="imgevent/sepak_takraw.jpeg" alt="sepak takraw">
                                    </div>
                                    <br>
                                    <a class="btn btn-primary" href="/StudentManage/event">View All Event</a>
                                </div>
                            </div>
                        </div>
                        <div style="grid-row: auto / span 2;">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="text-center">Calendar</h4>
                                    <div class="container">
                                        <div id="dycalendar"></div>
                                    </div>
                                    <br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                        <div  style="display: grid;
                                    grid-template-columns: 1fr 1fr;
                                    grid-column-gap: 20px;
                                    grid-row-gap: 20px;">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">Your Club</h4>
                                    <h4 class="text-center"><b>Esport</b></h4>
                                </div>  
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">Scorun</h4>
                                    <h4 class="text-center"><b>60</b></h4>
                                </div>  
                            </div>
                        </div>
                    </div>
                            
                    @endcan

                    
                    @can('isEditor')
                    <div style="display: grid;
                                grid-template-columns: 3fr 1fr;
                                grid-column-gap: 20px;
                                grid-row-gap: 20px;">
                        <div>
                            <h1><b>Event Overview</b> </h1>
                            <div class="card">
                                <div class="card-body" >
                                    <div  class="text-center">
                                        <img src="imgevent/mlbb.jpg" alt="mlbb" >
                                        <img src="imgevent/bola_sepak.jpg" alt="bola sepak" >
                                        <img src="imgevent/sepak_takraw.jpeg" alt="sepak takraw">
                                    </div>
                                    <br>
                                    <a class="btn btn-primary" href="/EditorManage/event2">View All Event</a>
                                </div>
                            </div>
                        </div>
                        <div style="grid-row: auto / span 2;">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="text-center">Calendar</h4>
                                    <div class="container">
                                        <div id="dycalendar"></div>
                                    </div>
                                    <br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                        <div  style="display: grid;
                                    grid-template-columns: 1fr 1fr;
                                    grid-column-gap: 20px;
                                    grid-row-gap: 20px;">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">Your Club Handle</h4>
                                    <h4 class="text-center"><b>Esport</b></h4>
                                </div>  
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">Total Student</h4>
                                    <h4 class="text-center"><b>60</b></h4>
                                </div>  
                            </div>
                        </div>
                    </div>
                    @endcan
                
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
@endsection
