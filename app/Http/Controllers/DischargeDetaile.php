<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DischargeDetailModel;
use App\Models\DischargeMedicinemodel;
use App\Models\PatientModal;

class DischargeDetaile extends Controller
{
    public function create(Request $request)
    {
        
        $data = [
            'patient_detail_id' => $request->discharge_patient_name,
            'discharge_admission_date' => $request->discharge_admission_date,
            'discharge_discharge_date' => $request->discharge_discharge_date,
            'prescription_corbidity' => json_encode($request->prescription_corbidity),
            'prescription_other' => $request->prescription_other,
            'prescription_final_diagnosis' => $request->prescription_final_diagnosis,
            'prescription_presenting_complaint' => $request->prescription_presenting_complaint,
            'prescription_notes_of_hospital_stay' => $request->prescription_notes_of_hospital_stay,
            'prescription_significant_labs' => $request->prescription_significant_labs,
            'prescription_significant_past_history' => $request->prescription_significant_past_history,
            'prescription_follow_up_instructions' => json_encode($request->prescription_follow_up_instructions),
            'prescription_second_other' => $request->prescription_second_other,
        ];
        
        $discharge_detail_id = DischargeDetailModel::insertGetId($data);
        $medication_name = $request->medication_name;
        $medication_route = $request->medication_route;
        $medication_frequency = $request->medication_frequency;
        $medication_instruction = $request->medication_instruction;
        

        $medication_duration_sequence = $request->medication_duration_sequence;
        $medication_duration_number = $request->medication_duration_number;
        $medication_dosage_input = $request->medication_dosage_input;
        $medication_dosage_select = $request->medication_dosage_select;
        
        foreach ($medication_name as $x => $value) {
            $data2 = [
                'discharge_detail_id' => $discharge_detail_id,
                'medication_name' => $value,
                'medication_duration_number' => $medication_duration_sequence[$x] . " " . $medication_duration_number[$x],
                'medication_dosage' => $medication_dosage_input[$x] . " " . $medication_dosage_select[$x],
                'medication_route' => $medication_route[$x],
                'medication_frequency' => $medication_frequency[$x],
                'medication_instruction' => $medication_instruction[$x],
            ];
            DischargeMedicinemodel::create($data2);
            
        }
        
        $newdata = DischargeDetailModel::with(['drugs', 'patient'])->whereId($discharge_detail_id)->first();
        // return $newdata->patient->patient_name;
        return view('/dischargeslip', compact('newdata'));
        //  return view('/discharge');
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