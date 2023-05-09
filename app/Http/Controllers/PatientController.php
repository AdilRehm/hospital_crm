<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientModal;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    
    public function index2(Request $request)
    {
        return PatientModal::where('patient_name', 'LIKE', '%'.$request->data.'%')->get();
        //dd($pati);
        // return view('viewpatient',compact('pati'));
    }
    public function index()
    {
        $pati=PatientModal::all();
        
      return view('viewpatient',compact('pati'));
    }
    public function create(){
        return view('patient.create');
    }
    public function store(Request $request){
        $pat=new PatientModal();
        //dd($pat);
        $pat->patient_name=$request->patient_name;
        $pat->fh_name=$request->fh_name;
        $pat->patient_number=$request->patient_number;
        $pat->patient_cnic=$request->patient_cnic;
        $pat->patient_gender=$request->patient_gender;
        $pat->patient_age=$request->patient_age;
       // dd();
        $pat->save();
        return view('patient');
    }
    public function edit(Request $request, $id)
    {
        
         $patient = PatientModal::find($id);
         //dd($patient);
        return view('patient', compact('patient'));
        
        //return redirect()->route('medicine.index')->with('success', 'Medicine updated successfully');
    }
    public function update(Request $request)
    {
        $ptid=$request->id;
        
        $patient = PatientModal::find($ptid);
        dd($patient);
        $patient->id=$request->id;
        $patient->patient_name=$request->patient_name;
        $patient->fh_name=$request->fh_name;
        $patient->patient_number=$request->patient_number;
        $patient->patient_cnic=$request->patient_cnic;
        $patient->patient_gender=$request->patient_gender;
        $patient->patient_age=$request->patient_age;
        $patient->update();
       return view('patient');
    }
    public function delete(Request $request, $id)
    {
        $id = $request->id;
        $patient = PatientModal::find($id);

        if ($patient) {
            $patient->delete();
            return redirect()->back()->with('success', 'Patient deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Patient not found.');
        }
    }
}
