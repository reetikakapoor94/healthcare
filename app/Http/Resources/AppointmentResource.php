<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name ?? null,
            'professional_id' => $this->healthcare_professional_id,
            'professional_name' => $this->professional->name ?? null,
            'specialty' => $this->professional->specialty ?? null,
            'start_time' => $this->appointment_start_time,
            'end_time' => $this->appointment_end_time,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
