@extends('layouts.app')
@section('title', 'View Patient')

@section('content')
    <div class="container">
    <Section class="patient-table">
      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>MRID</th>
                  <th>Patient Name</th>
                  <th>Father/Husband Name</th>
                  <th>Patient Number</th>
                  <th>Patient CNIC</th>
                  <th>Patient Gender</th>
                  <th>Patient Age</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
            
          @foreach ($pati as $patientvalue)
              <tr>
                  <td>{{$patientvalue->id}}</td>
                  <td>{{$patientvalue->patient_name}}</td>
                  <td>{{$patientvalue->fh_name}}</td>
                  <td>{{$patientvalue->patient_number}}</td>
                  <td>{{$patientvalue->patient_cnic}}</td>
                  <td>{{$patientvalue->patient_gender}}</td>
                  <td>{{$patientvalue->patient_age}}</td>
                  <td>{{$patientvalue->created_at}}</td>
                  <td>{{$patientvalue->updated_at}}</td>
                  <td class="d-flex"> 
                    <a class="btn btn-primary" href="{{ route('patient.edit', ['id'=> $patientvalue->id]) }}">Edit</a>
                    <a class="btn btn-danger ms-2" href="{{ route('viewpatient.delete', ['id'=> $patientvalue->id]) }}">Delete</a>
                  </td>

              </tr>
              @endforeach
          </tbody>
      </table>
    </Section>
    </div>
@endsection
