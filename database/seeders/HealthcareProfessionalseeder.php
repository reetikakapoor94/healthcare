<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthcareProfessional;


class HealthcareProfessionalSeeder extends Seeder {

public function run(){

    $list = [
    ['name'=>'Dr. Amit','specialty'=>'Cardiologist'],
    ['name'=>'Dr. Priya','specialty'=>'Pediatrician'],
    ['name'=>'Dr. Amit','specialty'=>'General Physician'],
    ['name'=>'Dr. Arun','specialty'=>'Dentist'],
    ['name'=>'Dr. Sahil','specialty'=>'Dermatologist'],
    ['name'=>'Dr. Dinesh','specialty'=>'Neurologist'],
    ['name'=>'Dr. Navyam','specialty'=>'Psychiatrist'],
    ['name'=>'Dr. Deepak','specialty'=>'Hematologist'],
    ['name'=>'Dr. Rajesh','specialty'=>'Allergist/Immunologist'],
    ];

    foreach($list as $p) 
        HealthcareProfessional::create($p);
}

}