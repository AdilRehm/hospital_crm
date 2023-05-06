<?php

namespace App\Http\Controllers;

use App\Models\PatientModal;
use Illuminate\Http\Request;
use App\Models\DischargeModel;
use Hamcrest\Core\HasToString;
use App\Models\DischargeDetailModel;

class DischargeController extends Controller
{
    public function create()
    {
        return view('discharge.create');
    }
    public function store(Request $request)
    {
        $dischargeuser = new DischargeModel;
        $dischargeuser->discharge_patient_name = $request->discharge_patient_name;
        $dischargeuser->discharge_admission_date = $request->discharge_admission_date;
        $dischargeuser->discharge_discharge_date = $request->discharge_discharge_date;
        $dischargeuser->prescription_other = $request->prescription_other;
        $dischargeuser->prescription_final_diagnosis = $request->prescription_final_diagnosis;
        $dischargeuser->prescription_presenting_complaint = $request->prescription_presenting_complaint;
        $dischargeuser->prescription_notes_of_hospital_stay = $request->prescription_notes_of_hospital_stay;
        $dischargeuser->prescription_significant_labs = $request->prescription_significant_labs;
        $dischargeuser->prescription_significant_past_history = $request->prescription_significant_past_history;
        $dischargeuser->prescription_follow_up_instructions = $request->prescription_follow_up_instructions;
        $dischargeuser->prescription_second_other = $request->prescription_second_other;
        $dischargeuser->medication_name = json_encode($request->medication_name);
        $dischargeuser->medication_duration = $request->medication_duration;
        $medication_dosage_input = $request->input('medication_dosage_input');
        $dischargeuser->medication_route = json_encode($request->medication_route);
        $dischargeuser->medication_frequency = json_encode($request->medication_frequency);
        $dischargeuser->medication_instruction = json_encode($request->medication_instruction);
        $dischargeuser->prescription_follow_up_instructions = json_encode($request->prescription_follow_up_instructions);
        $dischargeuser->prescription_corbidity = json_encode($request->prescription_corbidity);
        $medication_duration_sequence = json_encode($request->medication_duration_sequence);
        $medication_duration_number = json_encode($request->medication_duration_number);
        $dischargeuser->medication_duration_number = $medication_duration_sequence . " " . $medication_duration_number;
        $medication_dosage_input = json_encode($request->medication_dosage_input);
        $medication_dosage_select = json_encode($request->medication_dosage_select);
        $dischargeuser->medication_dosage = $medication_dosage_input . " " . $medication_dosage_select;
        $dischargeuser->save();

        return view('/discharge');
    }


    public function index()
    {
        $latestloadeddata = DischargeDetailModel::latest('created_at')->value('created_at');
        $newdata = DischargeDetailModel::with('drugs')->whereId(1)->first();
        // return $newdata->drugs;
        return view('/dischargeslip', compact('newdata'));
    }

    // public function edit(Request $request, $id)
    // {

    //      $user = UserModel::find($id);
    //      //dd($patient);
    //     return view('patient', compact('user'));

    //     //return redirect()->route('medicine.index')->with('success', 'Medicine updated successfully');
    // }
    // public function update(Request $request)
    // {
    //     $id = $request->id;
    //     $user = UserModel::find($id);
    //     $user->user_name=$request->user_name;
    //     $user->user_gender=$request->user_gender;
    //     $user->user_phone=$request->user_phone;
    //     $user->email=$request->email;
    //     $user->password=$request->password;
    //     $user->update();
    //    return view('patient');
    // }
    // public function delete(Request $request, $id)
    // {
    //     $id = $request->id;
    //     $user = UserModel::find($id);

    //     if ($user) {
    //         $user->delete();
    //         return redirect()->back()->with('success', 'User deleted successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'User not found.');
    //     }
    // }

}
