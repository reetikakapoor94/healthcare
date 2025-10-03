<?php

namespace App\Http\Controllers;

use App\Models\HealthcareProfessional;
use Illuminate\Http\Request;

class HealthcareProfessionalController extends Controller
{
    public function index(Request $request){
        $perPage = $request->get('per_page', 15);
        $pros = HealthcareProfessional::paginate($perPage);
        return response()->json($pros);
    }
}
