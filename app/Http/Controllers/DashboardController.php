<?php

namespace App\Http\Controllers;

use App\Models\DischargeDetailModel;
use App\Models\medicinemodel;
use App\Models\PatientModal;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showTotalUsers(){
        
         $totalUsers = PatientModal::all()->count();
         $totalmedicine = medicinemodel::all()->count();
         $totaldischarge=DischargeDetailModel::all()->count();
         $totaluser=User::all()->count();
         
        return view('dashboard', ['totalUsers' => $totalUsers, 'totalmedicine'=> $totalmedicine, 'totaldischarge'=> $totaldischarge, 'totaluser'=> $totaluser]);
    }
}
