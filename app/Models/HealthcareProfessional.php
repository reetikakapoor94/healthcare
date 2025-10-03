<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class HealthcareProfessional extends Model
{

protected $fillable = ['name','specialty'];


    public function appointments() {
      return $this->hasMany(Appointment::class);
    }
}