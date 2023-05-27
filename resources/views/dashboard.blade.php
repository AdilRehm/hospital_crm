@extends('layouts.app')
@extends('layouts.bodycontent')
@extends('layouts.header')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- @if (Route::has('login'))
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
            @endif --}}

        </div> -->
        <div class="row">
                <h1 class="col-12">Dashboard</h1>
            <div class="col-md-3">
                <div class="card ps-2">
                    <div class="card-title pt-3">
                        <h5>Total Number of Medicine</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h3 class="m-0 text-danger">
                                    @php
                                        echo $totalmedicine;
                                    @endphp
                                </h3>
                             
                                
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="bi bi-capsule fs-1 text-primary"></i>
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
                                <h3 class="m-0 text-danger">
                                    @php 
                                         echo $totalUsers;
                                    @endphp
                                </h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="bi bi-person-add fs-1 text-primary"></i>
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
                                <h3 class="m-0 text-danger">
                                    @php 
                                        echo $totaldischarge;
                                    @endphp
                                </h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="bi bi-file-plus fs-1 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card ps-2">
                    <div class="card-title pt-3">
                        <h5>Total Number of Users</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h3 class="m-0 text-danger">
                                    @php 
                                        echo $totaluser;
                                    @endphp
                                </h3>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="bi bi-people fs-1 text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
@endsection
