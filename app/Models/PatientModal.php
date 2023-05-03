<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
