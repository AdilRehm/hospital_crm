<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicinemodel;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class MedicineController extends Controller

{
    public function index2(Request $request){
        return medicinemodel::where('medicine_name', 'LIKE', '%'.$request->data.'%')->get();
    }
    public function index()
    {
        //$med=DB::table('medicine')->select('id','medicine_name','medicine_salt','medicine_category','medicine_remarks','created_at','updated_at')->get();
       $med=medicinemodel::all();
        $datamed=compact('med');
        return view('viewmedicine')->with($datamed);
    }
    public function create(){
        return view('medicine.create');
    }
    public function store(Request $request){
        
        $m=new medicinemodel;
        $m->medicine_name=$request->medicine_name;
        $m->medicine_salt=$request->medicine_salt;
        $m->medicine_category=$request->medicine_category;
        $m->medicine_duration_sequence=$request->medicine_duration_sequence;
        $m->medicine_dosage_input=$request->medicine_dosage_input;
        $m->medicine_route=$request->medicine_route;
        $m->medicine_instruction=$request->medicine_instruction;
        $m->medicine_remarks=$request->medicine_remarks;
        $m->save();
       return view ('medicine');
        //return redirect()->route('medicine')->with('success', 'Medicine create Successfully');
    }
    public function edit(Request $request, $id)
    {
        
         $medicine = medicinemodel::find($id);
        return view('medicine', compact('medicine'));
        
        //return redirect()->route('medicine.index')->with('success', 'Medicine updated successfully');
    }
    //not used yet
    public function update(Request $request)
    {
        $id = $request->id;
        $medicine = medicinemodel::find($id);
        $medicine->medicine_name=$request->medicine_name;
        $medicine->medicine_salt=$request->medicine_salt;
        $medicine->medicine_category=$request->medicine_category;
        $medicine->medicine_duration_sequence=$request->medicine_duration_sequence;
        $medicine->medicine_dosage_input=$request->medicine_dosage_input;
        $medicine->medicine_route=$request->medicine_route;
        $medicine->medicine_instruction=$request->medicine_instruction;

        $medicine->medicine_remarks=$request->medicine_remarks;
        $medicine->update();
       return view('medicine');
    }

    // for deleting the record
    public function delete(Request $request, $id)
    {
        $id = $request->id;
        $medicine = medicinemodel::find($id);

        if ($medicine) {
            $medicine->delete();
            return redirect()->back()->with('success', 'Medicine deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Medicine not found.');
        }
    }
}