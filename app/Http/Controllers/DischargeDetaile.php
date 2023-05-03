<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DischargeDetaile extends Controller
{
    public function create(Request $request)
    {
        // echo "<pre>";
        // print_r($request);
        // echo "</pre>";
        $data = [
            'discharge_patient_name' => $request->discharge_patient_name,
            'discharge_admission_date' => $request->discharge_admission_date,
            'discharge_discharge_date' => $request->discharge_discharge_date,
            'prescription_other' => $request->prescription_other,
            'prescription_final_diagnosis' => $request->prescription_final_diagnosis,
            'prescription_presenting_complaint' => $request->prescription_presenting_complaint,
            'prescription_notes_of_hospital_stay' => $request->prescription_notes_of_hospital_stay,
            'prescription_significant_labs' => $request->prescription_significant_labs,
            'prescription_significant_past_history' => $request->prescription_significant_past_history,
            'prescription_follow_up_instructions' => $request->prescription_follow_up_instructions,
            'prescription_second_other' => $request->prescription_second_other,
            'medication_name' => json_encode($request->medication_name),
            'medication_duration' => $request->medication_duration,
            'medication_route' => json_encode($request->medication_route),
            'medication_frequency' => json_encode($request->medication_frequency),
            'medication_instruction' => json_encode($request->medication_instruction),
            'prescription_follow_up_instructions' => json_encode($request->prescription_follow_up_instructions),
            'prescription_corbidity' => json_encode($request->prescription_corbidity),
            'medication_duration_number' => json_encode($request->medication_duration_sequence),
            'medication_dosage' => json_encode($request->medication_duration_number),
        ];
        $dischargeuser->= ;
        $dischargeuser->=;
        $dischargeuser->=;
        $dischargeuser->=;
        $dischargeuser->=;
        $dischargeuser-> = ;
        $dischargeuser-> = ;        
        $medication_duration_sequence =;
        $medication_duration_number =;
        $dischargeuser-> = $medication_duration_sequence." ".$medication_duration_number;
        $medication_dosage_input =json_encode($request->medication_dosage_input);
        $medication_dosage_select =json_encode($request->medication_dosage_select);
        $dischargeuser-> = $medication_dosage_input." ".$medication_dosage_select;



        return; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
