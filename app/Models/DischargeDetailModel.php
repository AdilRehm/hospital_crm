<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DischargeDetailModel extends Model
{
    protected $table = 'discharge_detail';
    protected $fillable = [
        'id',
        'discharge_patient_name',
        'discharge_admission_date',
        'discharge_discharge_date',
        'prescription_corbidity',
        'prescription_other',
        'prescription_final_diagnosis',
        'prescription_presenting_complaint',
        'prescription_notes_of_hospital_stay',
        'prescription_significant_labs',
        'prescription_significant_past_history',
        'prescription_follow_up_instructions',
        'prescription_second_other'
    ];
    public function dischargedetail(): HasOne
    {
        return $this->hasOne(DischargeMedicinemodel::class);
    }
}
