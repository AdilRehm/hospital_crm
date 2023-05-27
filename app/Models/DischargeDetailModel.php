<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DischargeDetailModel extends Model
{
    protected $table = 'discharge_detail';
    protected $fillable = [
        'id',
        'patient_detail_id',
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

    public function drugs(): HasMany
    {
        return $this->HasMany(DischargeMedicinemodel::class, 'discharge_detail_id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(PatientModal::class, 'patient_detail_id');
    }
}
