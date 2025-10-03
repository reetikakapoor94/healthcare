<?php
use Illuminate\Database\Seeder;
use App\Models\HealthcareProfessional;


class HealthcareProfessionalSeeder extends Seeder {

public function run(){

$list = [
['name'=>'Dr. Amit Sharma','specialty'=>'Cardiologist'],
['name'=>'Dr. Priya Singh','specialty'=>'Pediatrician'],
['name'=>'Dr. Rajesh Patel','specialty'=>'General Physician'],
];

    foreach($list as $p) 
        HealthcareProfessional::create($p);
}

}