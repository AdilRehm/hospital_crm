@extends('layouts.app')
@section('title', 'DischargeSlip')
@section('content')
<section id="printarea">
    <div class="container">
       <div class="row">
            <h4 class="col-12 d-flex justify-content-center">Discharge Summery</h4>
            <hr class="w-100">
            @foreach ($newdata as $dischargedata)
            <div class="col-4 d-flex flex-column">
                <label for="">Name: <span>{{$dischargedata->discharge_patient_name}}</span></label>
                <label for="">MR# <span>{{$dischargedata->id}}</span></label>
                <label for="">Condition on Discharge: <span>{{$dischargedata->prescription_other}}</span></label>
            </div>
            <div class="col-4 d-flex flex-column">
                <label for="">Age/Gender: <span>{{$dischargedata->discharge_patient_name}}</span></label>
                <label for="">Date of Admission: <span>{{$dischargedata->discharge_admission_date}}</span></label>
                <label for="">SSP: <span>{{$dischargedata->discharge_patient_name}}</span></label>
            </div>
            <div class="col-4 d-flex flex-column">
                <label for="">Date: <span>{{$dischargedata->created_at}}</span></label>
                <label for="">Date of Discharge: <span>{{$dischargedata->discharge_discharge_date}}</span></label>
            </div>
            <hr class="w-100">
            <label class="col-12" for="">Presription</label>
            <div class="col-12 d-flex flex-column">
                <strong for="">Co-Morbidity</strong>
                <label for="">
                    @foreach (json_decode($dischargedata->prescription_corbidity) as $corbidity)
                        {{ $corbidity }}<br>
                    @endforeach
                </label>
                <strong for="">Final Diagnose</strong>
                <label for="">{{$dischargedata->prescription_final_diagnosis}}</label>
                <strong for="">Presenting Complaint</strong>
                <label for="">{{$dischargedata->prescription_presenting_complaint}}</label>
                <strong for="">Brief Notes of Hospital Stay</strong>
                <label for="">{{$dischargedata->prescription_notes_of_hospital_stay}}</label>
                <strong for="">Significant Labs</strong>
                <label for="">{{$dischargedata->prescription_significant_labs}}</label>
                <strong for="">Follow Up Instructions</strong>
                <label for="">
                    @php
                        foreach (json_decode($dischargedata->prescription_follow_up_instructions) as $value) {
                            echo getFOllowUps($value)."<br>";
                        }
                    @endphp
                </label>
                <strong for="">Doctor Name</strong>
                <label for="">{{$dischargedata->prescription_second_other}}</label>
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
                        <tr>
                            <td>1.</td>
                            <td>
                                @php
                                    foreach (json_decode($dischargedata->medication_name) as $medname) {
                                        echo ($medname)."<br>";
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    foreach (json_decode($dischargedata->medication_dosage) as $meddosage) {
                                        echo ($meddosage)."<br>";
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    foreach (json_decode($dischargedata->medication_frequency) as $medfeq) {
                                        echo ($medfeq)."<br>";
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                foreach (json_decode($dischargedata->medication_instruction) as $medinst) {
                                    echo ($medinst)."<br>";
                                }
                                @endphp
                            </td>
                            <td>
                                @php
                                foreach (json_decode($dischargedata->medication_duration_number) as $meddurnum) {
                                    echo ($meddurnum)."<br>";
                                }
                                @endphp
                            </td>
                            <td>
                                @php
                                foreach (json_decode($dischargedata->medication_route) as $medroute) {
                                    echo ($medroute)."<br>";
                                }
                                @endphp
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
            <div class="col-12 d-flex flex-row no-print">
            <button class="btn btn-danger w-25" onclick="printArea()">Print the Discharge Survey</button>
            <button class="btn btn-primary w-25 ms-2" onclick="closepoup()">Close Survey</button>
            </div>
       </div> 
    </div>
</section>
@endsection