@extends('layouts.app')
@section('title', 'Medicine')
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-12">Medicine View</h1>
        </div>
    <Section class="medicine-table">
      <table id="tabledata" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Medicine Name</th>
                  <th>Medicine Salt</th>
                  <th>Medicine Category</th>
                  <th>Duration</th>
                  <th>Dosage</th>
                  <th>Route</th>
                  <th>Instruction</th>
                  <th>Remarks</th>             
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($med as $datavalue)
              <tr>
                  <td>{{$datavalue->id}}</td>
                  <td>{{$datavalue->medicine_name}}</td>
                  <td>{{$datavalue->medicine_salt}}</td>
                  <td>{{$datavalue->medicine_category}}</td>
                  <td>{{$datavalue->medicine_duration_sequence}}</td>
                  <td>{{$datavalue->medicine_dosage_input}}</td>
                  <td>{{$datavalue->medicine_route}}</td>
                  <td>{{$datavalue->medicine_instruction}}</td>
                  <td>{{$datavalue->medicine_remarks}}</td>
                  <td class="d-flex"> 
                    <a class="btn btn-primary" href="{{ route('medicine.edit', ['id'=> $datavalue->id]) }}">Edit</a>
                    <a class="btn btn-danger ms-2" href="{{ route('medicine.delete', ['id'=> $datavalue->id]) }}">Delete</a>
                  </td>

              </tr>
              @endforeach
          </tbody>
      </table>
    </Section>
    </div>
@endsection


