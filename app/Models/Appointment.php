<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\HealthcareProfessional;


class Appointment extends Model
{

protected $fillable = [
    'user_id',
    'healthcare_professional_id',
    'appointment_start_time',
    'appointment_end_time',
    'status'
];


protected $casts = [
'appointment_start_time' => 'datetime',
'appointment_end_time' => 'datetime',
];


public function user(){ 
    return $this->belongsTo(User::class); 
}

public function professional(){
     return $this->belongsTo(HealthcareProfessional::class,'healthcare_professional_id');
}

}