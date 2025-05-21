<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoidLogs extends Model
{
    use HasFactory;

    protected $table = 'void_logs'; // only if table name is not default plural

    protected $fillable = [
        'booking_id',
        'service_id',
        'patient_id',
        'staff_id',
        'service_cost',
        'status',
        'start_date',
        'branch_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
