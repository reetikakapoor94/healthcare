<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentActionRequest extends FormRequest
{
    public function authorize(): bool
    {
        $appointment = $this->route('appointment'); // Route model binding

        return $appointment && $appointment->user_id === $this->user()->id;
    }

    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [
            'authorize' => 'You are not authorized to cancel this appointment',
        ];
    }
}
