@extends('layouts.app')
@section('title', 'Add User')
@section('content')
<div class="container">
            <div class="row d-flex align-content-center">
                <h4 class="col-12 pb-2 text-start">User Role</h4>
            </div>
            <div class="card shadow">
                <div class="card-body my-3">
                    <div class="accordion row" id="accordionExample">
                        <div class="col-md-auto col-4 p-0">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Add User
                                </button>
                            </h2>
                        </div>
                        <div class="col-md-auto col-4 p-0">
                            <h2 class="accordion-header" id="useroperations">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#useroperationsthree" aria-expanded="false" aria-controls="useroperationsthree">
                                User Operations
                                </button>
                            </h2>
                        </div>
                        <div class="row">
                            <!-- Add User list form-->
                            <div class="col-md-12">
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body row border">
                                        <form method="POST" action="/register">
                                            @csrf
                                            
                                            <div class="row g-3 align-items-center">
                                                <div class="col-2">
                                                    <label for="doctorname" class="col-form-label"><strong>Name:</strong></label>
                                                </div>
                                                <div class="col-10">
                                                    <input type="text" id="doctorname" required="required" class="form-control" name="name" aria-describedb="doctornamehelpname" placeholder="Name">
                                                </div>
                                                
                                                <div class="col-2">
                                                    <label for="doctorphone" class="col-form-label"><strong>Phone#</strong></label>
                                                </div>
                                                <div class="col-10">
                                                    <div class="input-group">
                                                        <div class="input-group-text" id="btnGroupAddon">+92</div>
                                                        <input type="text" required="required" id="doctorphone" class="form-control" name="user_phone" aria-describedby="doctorphonehelp" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <label for="doctormail" class="col-form-label"><strong>Email*</strong></label>
                                                </div>
                                                <div class="col-10">
                                                    <input type="email" required="required" id="doctormail" class="form-control" name="email" aria-describedby="doctormailhelp" placeholder="example@gmail.com">
                                                </div>
                                                <div class="col-2">
                                                    <label for="doctormail" class="col-form-label"><strong>Email Verfied*</strong></label>
                                                </div>
                                                <div class="col-10">
                                                    <input type="email" id="doctormail" class="form-control" name="email_verified_at" aria-describedby="doctormailhelp" placeholder="example@gmail.com">
                                                </div>
                                                <div class="col-2">
                                                    <label for="doctorpassword" class="col-form-label"><strong>Password:</strong></label>
                                                </div>
                                                <div class="col-10 d-flex flex-row justify-content-evenly">
                                                    <input type="text" id="doctorpassword" class="form-control me-2" name="password" aria-describedby="doctorpasswordhekp" placeholder="Password">
                                                </div>
                                                <div class="col-12 mt-4">
                                                    <button type="submit" class="btn btn-primary" required="required" name="adduser" value="Save User">Save User</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
@endsection

