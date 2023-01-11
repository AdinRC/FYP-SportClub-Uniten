@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                        @can('isAdmin')
                            <h4 class="text-center">This is for Admin</h4>
                            <a class="btn btn-primary" href="/AdminManage/event">See All Event</a>
                        @endcan

                        @can('isUser')
                            <h4 class="text-center">This is for Student</h4>
                            <a class="btn btn-primary" href="/StudentManage/event">See All Event</a>
                        @endcan

                        @can('isEditor')
                            <h4 class="text-center">This is for Uniten Club and Societies Administrator</h4>
                            <a class="btn btn-primary" href="/EditorManage/event2">See All Event</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
