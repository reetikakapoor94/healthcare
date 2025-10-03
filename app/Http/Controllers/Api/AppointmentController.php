<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentActionRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\AppointmentCollection;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
    $perPage = $request->get('per_page', 15);

    $appointments = $request->user()
        ->appointments()
        ->with('professional')
        ->orderBy('appointment_start_time', 'desc')
        ->paginate($perPage);

    return new AppointmentCollection($appointments);
    }

    public function store(BookAppointmentRequest $request)
    {
        $appointment = Appointment::book($request->user(), $request->validated());

        if (!$appointment instanceof Appointment) {
            return response()->json(['message' => $appointment], 422);
        }

        return response()->json($appointment, 201);
    }

   public function cancel(AppointmentActionRequest $request, Appointment $appointment)
    {
    $result = $appointment->cancel();

    if ($result !== true) {
        return response()->json(['message' => $result], 422);
    }

    return response()->json(['message' => 'Cancelled successfully']);
    }

   
    public function complete(AppointmentActionRequest $request, Appointment $appointment)
    {
        $appointment->markComplete();

        return response()->json(['message' => 'Marked completed']);
    }
}
