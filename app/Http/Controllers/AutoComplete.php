<?php

namespace App\Http\Controllers;

use App\Models\medicinemodel;
use App\Models\PatientModal;
use Illuminate\Http\Request;

class AutoComplete extends Controller
{
    public function autosearch(Request $request){
        $term = $request->input('term');
        $suggestions = PatientModal::where('id', 'like', '%'.$term.'%')
            ->orWhere('patient_name', 'like', '%'.$term.'%')
            ->orWhere('patient_number', 'like', '%'.$term.'%')
            ->get(['id','patient_name', 'patient_number']);
        return response()->json($suggestions);
    }



    public function get(Request $request){
        $term = $request->input('term');
        $suggestions = PatientModal::where('id', 'like', '%'.$term.'%')
            ->orWhere('patient_name', 'like', '%'.$term.'%')
            ->orWhere('patient_number', 'like', '%'.$term.'%')
            ->get(['id','patient_name', 'patient_number']);
            return response()->json($suggestions); 
    }

    public function getmed(Request $request){
        $term = $request->input('term');
        $suggestions = medicinemodel::where('id', 'like', '%'.$term.'%')
            ->orWhere('medicine_name', 'like', '%'.$term.'%')
            ->orWhere('medicine_salt', 'like', '%'.$term.'%')
            ->get(['id','medicine_name', 'medicine_salt', 'medicine_duration_sequence', 'medicine_dosage_input', 'medicine_route', 'medicine_instruction','medicine_remarks']);
            return response()->json($suggestions); 
    }

    

}
