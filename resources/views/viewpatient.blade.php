@extends('layouts.app')
@extends('layouts.bodycontent')
@extends('layouts.header')
@section('title', 'View Patient')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-12">Patient View</h1>
        </div>
    <Section class="patient-table">
      <table id="tabledata" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>MRID</th>
                  <th>Patient Name</th>
                  <th>Father/Husband Name</th>
                  <th>Patient Gender</th>
                  <th>Patient Age</th>
                  <th>Patient DOA</th>
                  <th>Patient DOD</th>
                  <th>Patient Stable</th>
                  <th>Patient SSP</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
            
          @foreach ($pati as $patientvalue)
              <tr>
                  <td>{{$patientvalue->id}}</td>
                  <td>{{$patientvalue->patient_name}}</td>
                  <td>{{$patientvalue->fh_name}}</td>
                  <td>{{$patientvalue->patient_gender}}</td>
                  <td>{{$patientvalue->patient_age}}</td>
                  <td>{{$patientvalue->patient_admission_date}}</td>
                  <td>{{$patientvalue->patient_discharge_date}}</td>
                  <td>{{$patientvalue->stable_patient}}</td>
                  <td>{{$patientvalue->patient_ssp}}</td>
                  <td class="d-flex"> 
                    <a class="btn btn-primary" href="{{ route('patient.edit', ['id'=> $patientvalue->id]) }}">Edit</a>
                    <a class="btn btn-warning ms-2" href="/discharge/{{ $patientvalue->id }}">Discharge</a>
                    <a class="btn btn-danger ms-2" href="{{ route('viewpatient.delete', ['id'=> $patientvalue->id]) }}">Delete</a>
                  </td>

              </tr>
              @endforeach
          </tbody>
      </table>
    </Section>
    </div>
@endsection
