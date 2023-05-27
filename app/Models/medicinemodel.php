<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class medicinemodel extends Model
{
    protected $table='medicine';
    protected $fillable=[
        'id',
        'medicine_name',
        'medicine_salt',
        'medicine_category',
        'medicine_duration_sequence',
        'medicine_dosage_input',
        'medicine_route',
        'medicine_instruction',
        'medicine_remarks'
    ];


    // public function dischargepatient(): BelongsTo
    // {
    //     return $this->belongsTo(DischargeDetailModel::class);
    // }
}
