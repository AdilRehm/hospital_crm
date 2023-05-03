<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicinemodel extends Model
{
    protected $table='medicine';
    protected $fillable=[
        'id',
        'medicine_name',
        'medicine_salt',
        'medicine_category',
        'medicine_remarks'
    ];
}
