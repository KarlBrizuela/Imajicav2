<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoidLogs extends Model
{
    use HasFactory;

    protected $table = 'void_logs';

    protected $fillable = [
        'booking_id',
        'service_id',
        'patient_id',
        'staff_id',
        'branch_id',
        'status',
        'start_date',
    ];

    // Use casts instead of dates (Laravel 8+)
    protected $casts = [
        'start_date' => 'date',
    ];

    // Relationships
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class, 'service_id');
    }

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'patient_id');
    }

    public function staff()
    {
        return $this->belongsTo(\App\Models\Staff::class, 'staff_id');
    }

    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class, 'branch_id');
    }
}
