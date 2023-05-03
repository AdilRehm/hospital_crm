@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div> -->
        <div class="row">
            <div class="col-md-3">
                <div class="card ps-2">
                    <div class="card-title pt-3">
                        <h5>Total Appointments</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h3 class="m-0">0</h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h48v48H0z" fill="none"/><path d="M6 26h16V6H6v20zm0 16h16V30H6v12zm20 0h16V22H26v20zm0-36v12h16V6H26z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card ps-2">
                    <div class="card-title pt-3">
                        <h5>Registered Patients</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h3 class="m-0">0</h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h48v48H0z" fill="none"/><path d="M6 26h16V6H6v20zm0 16h16V30H6v12zm20 0h16V22H26v20zm0-36v12h16V6H26z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card ps-2">
                    <div class="card-title pt-3">
                        <h5>Total Disharge Patient</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h3 class="m-0">0</h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h48v48H0z" fill="none"/><path d="M6 26h16V6H6v20zm0 16h16V30H6v12zm20 0h16V22H26v20zm0-36v12h16V6H26z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card ps-2">
                    <div class="card-title pt-3">
                        <h5>Total Discharge</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h3 class="m-0">0</h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <svg height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h48v48H0z" fill="none"/><path d="M6 26h16V6H6v20zm0 16h16V30H6v12zm20 0h16V22H26v20zm0-36v12h16V6H26z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
@endsection
