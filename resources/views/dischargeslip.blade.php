@extends('layouts.app')
@extends('layouts.bodycontent')
@extends('layouts.header')
@section('title', 'DischargeSlip')
@section('content')
<section id="printarea">
    <div class="container">
       <div class="row">
            <h4 class="col-12 d-flex justify-content-center">Discharge Summery</h4>
            <hr class="w-100">
            {{-- @foreach ($newdata as $newdata) --}}
            <div class="col-4 d-flex flex-column">
                <label for="">Name: <span>{{$newdata->discharge_patient_name}}</span></label>
                <label for="">MR# <span>{{$newdata->id}}</span></label>
                <label for="">Condition on Discharge: <span>{{$newdata->prescription_other}}</span></label>
            </div>
            <div class="col-4 d-flex flex-column">
                <label for="">Age/Gender: <span>{{$newdata->discharge_patient_name}}</span></label>
                <label for="">Date of Admission: <span>{{$newdata->discharge_admission_date}}</span></label>
                <label for="">SSP: <span>{{$newdata->discharge_patient_name}}</span></label>
            </div>
            <div class="col-4 d-flex flex-column">
                <label for="">Date: <span>{{$newdata->created_at}}</span></label>
                <label for="">Date of Discharge: <span>{{$newdata->discharge_discharge_date}}</span></label>
            </div>
            <hr class="w-100">
            <label class="col-12" for="">Presription</label>
            <div class="col-12 d-flex flex-column">
                <strong for="">Co-Morbidity</strong>
                <label for="">
                    @if (!is_null($newdata->prescription_corbidity))
                    @foreach (json_decode($newdata->prescription_corbidity) as $corbidity)
                        {{ $corbidity }}<br>
                    @endforeach
                    @endif
                </label>
                <strong for="">Final Diagnose</strong>
                <label for="">{{$newdata->prescription_final_diagnosis}}</label>
                <strong for="">Presenting Complaint</strong>
                <label for="">{{$newdata->prescription_presenting_complaint}}</label>
                <strong for="">Brief Notes of Hospital Stay</strong>
                <label for="">{{$newdata->prescription_notes_of_hospital_stay}}</label>
                <strong for="">Significant Labs</strong>
                <label for="">{{$newdata->prescription_significant_labs}}</label>
                <strong for="">Follow Up Instructions</strong>
                <label for="">
                    @php
                    if (!is_null($newdata->prescription_follow_up_instructions)){
                        foreach (json_decode($newdata->prescription_follow_up_instructions) as $value) {
                            echo getFOllowUps($value)."<br>";
                        }
                    }
                    @endphp
                </label>
                <strong for="">Doctor Name</strong>
                @if (!is_null($newdata->prescription_second_other))
                <label for="">{{$newdata->prescription_second_other}}</label>
                @endif
            </div>
            <h4 class="col-12 mt-4">Medication</h4>
            <div class="col-12 mt-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Drug</th>
                            <th>Dosage</th>
                            <th>Frequency</th>
                            <th>Duration</th>
                            <th>Instruction</th>
                            <th>Route</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newdata->drugs as $x => $item)
                            <tr>
                                <td>{{ $x+1 }}.</td>
                                <td>{{ $item->medication_name }}</td>
                                <td>{{ $item->medication_duration_number }}</td>
                                <td>{{ $item->medication_dosage }}</td>
                                <td>{{ $item->medication_route }}</td>
                                <td>{{ $item->medication_frequency }}</td>
                                <td>{{ $item->medication_instruction }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- @endforeach --}}
            <div class="col-12 d-flex flex-row no-print">
            <button class="btn btn-danger w-25" onclick="printArea()">Print the Discharge Survey</button>
            <button class="btn btn-primary w-25 ms-2" onclick="closepoup()">Close Survey</button>
            </div>
       </div> 
    </div>
</section>
@endsection