@extends('layouts.app')
{{-- @extends('layouts.header') --}}
@extends('bodycontent')
@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <div class="accordion row" id="accordionExample">
                        <div class="col-md-auto col-auto p-0">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Add User
                                </button>
                            </h2>
                        </div>
                        {{-- <div class="col-md-auto col-4 p-0">
                            <h2 class="accordion-header" id="usermodules">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#usermodulestwo" aria-expanded="false" aria-controls="usermodulestwo">
                                User Modules
                                </button>
                            </h2>
                        </div> --}}
                        <div class="col-md-auto col-auto p-0">
                            <h2 class="accordion-header" id="useroperations">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#useroperationsthree" aria-expanded="false" aria-controls="useroperationsthree">
                                User Operations
                                </button>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body row border">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- User Modules section collapse list form-->
                            {{-- <div class="col-md-12">
                                <div id="usermodulestwo" class="accordion-collapse collapse" aria-labelledby="usermodules" data-bs-parent="#accordionExample">
                                    <div class="accordion-body d-flex d-inline-flex">
                                        <form class="row">    
                                            <div class="col-md-2">
                                                <label for="usermodulename" class="col-form-label"><strong>Name</strong></label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" id="usermodulename" required="required" class="form-control" name="usermodule_name" aria-describedb="doctornamehelpname" placeholder="Name">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="doctorrole" class="col-form-label"><strong>User Module</strong></label>
                                            </div>
                                            <div class="col-md-10 mt-3 mb-2 d-flex justify-content-around">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole1" name="doctor_role1" value="Dashboard" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole1">
                                                    Dashboard
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole2" name="doctor_role2" value="Medicine" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole2">
                                                    Medicine
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole3" name="doctor_role3" value="Patient" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole3">
                                                    Patient
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Discharge" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                        Discharge
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="moduleremarks" class="col-form-label"><strong>Remarks:</strong></label>
                                            </div>
                                            <div class="col-md-10 d-flex flex-row justify-content-evenly">
                                                <input type="text" id="moduleremarks" class="form-control me-2" name="moduler_emarks" aria-describedby="moduleremarkshelp" placeholder="Remarks">
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <button type="submit" class="btn btn-primary" required="required" name="save_user_module">Save User Module</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                             <!-- User Operations section collapse list form-->
                            <div class="col-md-12">
                                <div id="useroperationsthree" class="accordion-collapse collapse" aria-labelledby="useroperations" data-bs-parent="#accordionExample">
                                    <div class="accordion-body d-flex d-inline-flex">
                                        <form class="row">
                                            <div class="col-md-2">
                                                <label for="useroperationsname" class="col-form-label"><strong>Name</strong></label>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" id="useroperationsname" required="required" class="form-control" name="useroperation_name" aria-describedb="doctornamehelpname" placeholder="Name">
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <label for="doctorrole" class="col-form-label"><strong>User Operations:</strong></label>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole1" name="doctor_role1" value="Dashboard" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole1">
                                                        View Dashboard
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole2" name="doctor_role2" value="Medicine" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole2">
                                                        Medicine
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole3" name="doctor_role3" value="Patient" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole3">
                                                        Patient
                                                    </label>                                                
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Discharge" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                            Add/Update Discharge
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Radiology Manager" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                        Creat Health Records
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Radiology Manager" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                        Add Appointments
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Radiology Manager" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                        View Patient
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Radiology Manager" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                    Add/Update Patient
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Radiology Manager" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                        Delete Patient
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Radiology Manager" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                        Edit/Update Medicine
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Radiology Manager" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                        View Medicine
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="doctorrole4" name="doctor_role4" value="Radiology Manager" aria-describedby="doctoraccesshelp">
                                                    <label class="form-check-label fs-6" for="doctorrole4">
                                                        Delete Medicine
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="operationremarks" class="col-form-label"><strong>Remarks:</strong></label>
                                            </div>
                                            <div class="col-md-10 mt-3 d-flex flex-row justify-content-evenly">
                                                <input type="text" id="operationremarks" class="form-control me-2" name="operation_emarks" aria-describedby="operationremarkshelp" placeholder="Remarks">
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <button type="submit" class="btn btn-primary" required="required" name="save_user_operation">Save User Operation</button>
                                            </div>
                                        </form>
                                    </div>     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
@endsection
