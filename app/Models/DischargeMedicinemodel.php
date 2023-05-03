<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DischargeMedicinemodel extends Model
{
    protected $table='discharge_detail';
    protected $fillable=[
        'id',
        'discharge_detail_id', 
        'discharge_patient_name',
        'medication_name',
        'medication_duration',
        'medication_duration_number',
        'medication_dosage',
        'medication_route',
        'medication_frequency',
        'medication_instruction'
    ];
    public function dischargemedicine(): BelongsTo
    {
        return $this->belongsTo(DischargeDetailModel::class);
    }
}