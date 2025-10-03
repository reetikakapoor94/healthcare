<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // you can also add auth checks here
    }

    public function rules(): array
    {
        return [
            'healthcare_professional_id' => 'required|exists:healthcare_professionals,id',
            'appointment_start_time' => 'required|date|after:now',
            'appointment_end_time' => 'required|date|after:appointment_start_time',
        ];
    }

    public function messages(): array
    {
        return [
            'healthcare_professional_id.required' => 'Please select a healthcare professional',
            'healthcare_professional_id.exists' => 'Selected professional does not exist',
            'appointment_start_time.after' => 'Start time must be in the future',
            'appointment_end_time.after' => 'End time must be after start time',
        ];
    }
}
