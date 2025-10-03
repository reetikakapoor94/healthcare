<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'healthcare_professional_id',
        'appointment_start_time',
        'appointment_end_time',
        'status',
    ];

    // Relationships
    public function professional()
    {
        return $this->belongsTo(HealthcareProfessional::class, 'healthcare_professional_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope: Only active appointments
    public function scopeActive($query)
    {
    return $query->where('status', 'booked');
    }

    // Check ownership
    public function isOwnedBy($user)
    {
        return $this->user_id === $user->id;
    }

    // Booking logic
    public static function book($user, $data)
    {
        $start = Carbon::parse($data['appointment_start_time']);
        $end = Carbon::parse($data['appointment_end_time']);

        if ($end->lte($start)) {
            return 'End time must be after start time';
        }

        return DB::transaction(function () use ($user, $data, $start, $end) {
            $conflict = self::where('healthcare_professional_id', $data['healthcare_professional_id'])
                ->active()
                ->where(function ($q) use ($start, $end) {
                    $q->whereBetween('appointment_start_time', [$start, $end->copy()->subSecond()])
                      ->orWhereBetween('appointment_end_time', [$start->copy()->addSecond(), $end])
                      ->orWhere(function ($q2) use ($start, $end) {
                          $q2->where('appointment_start_time', '<', $start)
                             ->where('appointment_end_time', '>', $end);
                      });
                })
                ->lockForUpdate()
                ->exists();

            if ($conflict) {
                return 'Professional not available at requested time';
            }

            return self::create([
                'user_id' => $user->id,
                'healthcare_professional_id' => $data['healthcare_professional_id'],
                'appointment_start_time' => $start,
                'appointment_end_time' => $end,
                'status' => 'booked',
            ]);
        });
    }

    // Cancel logic
    public function cancel()
    {
        $now = Carbon::now();
        $diffHours = $now->diffInHours(Carbon::parse($this->appointment_start_time), false);

        if ($diffHours >= 0 && $diffHours < 24) {
            return 'Cannot cancel within 24 hours of appointment';
        }

        $this->update(['status' => 'cancelled']);
        return true;
    }

    // Mark as complete
    public function markComplete()
    {
        $this->update(['status' => 'completed']);
    }
    
}
