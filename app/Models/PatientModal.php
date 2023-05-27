<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PatientModal extends Model
{
    protected $table='patient';
    protected $fillable=[
        'id',
        'patient_name',
        'fh_name',
        'patient_number',
        'patient_cnic',
        'patient_gender',
        'patient_age',
        'patient_admission_date',
        'patient_discharge_date',
        'stable_patient',
        'patient_ssp'
    ];
   
}
