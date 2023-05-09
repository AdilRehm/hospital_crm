@extends('layouts.app')
@extends('layouts.bodycontent')
@extends('layouts.header')
@section('title', 'Medicine')

@section('content')
    <div class="container">
    <Section class="medicine-table">
      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Medicine Name</th>
                  <th>Medicine Salt</th>
                  <th>Medicine Category</th>
                  <th>Medicine Remarks</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  
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
                  <td>{{$datavalue->medicine_remarks}}</td>
                  <td>{{$datavalue->created_at}}</td>
                  <td>{{$datavalue->updated_at}}</td>
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
<!-- <script>
    // Basic example
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});
</script> -->