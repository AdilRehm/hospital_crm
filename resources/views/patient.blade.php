@extends('layouts.app')
@extends('layouts.bodycontent')
@extends('layouts.header')
@section('title', isset($patient) ? 'Update Patient' : 'Add new Patient')

@section('content')
    <div class="container">
        <form class="" method="POST" action="{{ isset($patient) ? route('patient.update') : route('patient.store') }}">
            @csrf
            <div class="row d-flex align-content-center">
                <h4 class="col-12 pb-2 text-center">Add Patient</h4>
            </div>
            <div class="card shadow">
                <div class="card-body my-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-3">
                            <label for="mrnum" class="col-form-label">Mr#</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="mrnum" class="form-control" name="id" value="{{isset($patient) ? $patient->id : ''}}" aria-describedby="itemnamehelpname" disabled>
                        </div>
                        <div class="col-3">
                            <label for="name" class="col-form-label">Name*</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="name" class="form-control" name="patient_name" value="{{isset($patient) ? $patient->patient_name : ''}}" aria-describedby="salthelpname" placeholder="Kindly enter Patient">
                        </div>
                        <div class="col-3">
                            <label for="fhname" class="col-form-label">Father/ Husband Name:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="fhname" class="form-control" name="fh_name" value="{{isset($patient) ? $patient->fh_name : ''}}" aria-describedby="salthelpname" placeholder="Father/ Husband name">
                        </div>
                        <div class="col-3">
                            <label for="phone" class="col-form-label">Phone#</label>
                        </div>
                        <div class="col-9">
                            <div class="input-group">
                                <div class="input-group-text" id="btnGroupAddon">+92</div>
                                <input type="text" id="phone" class="form-control" name="patient_number" value="{{isset($patient) ? $patient->patient_number : ''}}" aria-describedby="btnGroupAddon" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="cnic" class="col-form-label">CNIC:</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="cnic" class="form-control" name="patient_cnic" value="{{isset($patient) ? $patient->patient_cnic:''}}" aria-describedby="cnichelpname" placeholder="Enter CNIC Number">
                        </div>
                        <div class="col-3">
                            <label for="gender" class="col-form-label">Gender:</label>
                        </div>
                        <div class="col-9 d-flex flex-row justify-content-evenly">
                            <p class=""><input type="radio" class="form-checkbox" id="gender-male" name="patient_gender" value="Male" aria-describedby="genderhelpname"
                            @if (isset($patient) && $patient->patient_gender == 'Male')
                                checked
                            @endif
                             >&nbsp;Male</p>
                            <p class=""><input type="radio" class="form-checkbox" id="gender-female" name="patient_gender" value="Female"  aria-describedby="genderhelpname"
                            @if (isset($patient) && $patient->patient_gender == 'Female')
                                checked
                            @endif
                            >&nbsp;Female</p>
                            <p class=""><input type="radio" class="form-checkbox" id="gender-other" name="patient_gender" value="other"  aria-describedby="genderhelpname"
                            @if (isset($patient) && $patient->patient_gender == 'Other')
                                checked
                            @endif
                            >&nbsp;Other</p>
                        </div>
                        <div class="col-3">
                            <label for="age" class="col-form-label">Age:</label>
                        </div>
                        <div class="col-9">
                            <input type="number" id="age" class="form-control me-2 w-50 d-block" name="patient_age" value="{{isset($patient) ? $patient->patient_age:''}}" aria-describedby="agehelpname" placeholder="">
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary" name="addpatient">
                            @if (isset($patient))
                                Update
                                @else
                                Add Patient
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>              
    </div>
@endsection
