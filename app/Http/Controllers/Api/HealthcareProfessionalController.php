<?php

namespace App\Http\Controllers\Api;

use App\Models\HealthcareProfessional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthcareProfessionalController extends Controller
{
    public function index(Request $request){
        $perPage = $request->get('per_page', 15);
        $pros = HealthcareProfessional::paginate($perPage);
        return response()->json($pros);
    }
}
