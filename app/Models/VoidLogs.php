<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoidLogs extends Model
{
    use HasFactory;

    protected $table = 'void_logs'; // Adjust table name if different

    protected $fillable = [
        'booking_id',
        'service_id',
        'patient_id',
        'staff_id',
        'branch_id',
        'status',
        'start_date',
        'void_reason',
        'void_type',
        'original_amount',
        // Order-specific fields
        'customer_name',
        'customer_email',
        'service_description',
        'payment_method',
        'payment_status',
        'order_status',
        'order_number',
        'metadata'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'original_amount' => 'decimal:2',
        'metadata' => 'array'
    ];

    // Existing relationships for service bookings
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // Accessor to get the display name (customer name or patient name)
    public function getDisplayNameAttribute()
    {
        if ($this->void_type === 'ORDER' && $this->customer_name) {
            return $this->customer_name;
        }
        
        if ($this->patient) {
            return trim($this->patient->firstname . ' ' . $this->patient->lastname);
        }
        
        return $this->customer_name ?? 'N/A';
    }

    // Accessor to get the service name or description
    public function getServiceDisplayAttribute()
    {
        if ($this->void_type === 'ORDER' && $this->service_description) {
            return $this->service_description;
        }
        
        return $this->service ? $this->service->service_name : 'N/A';
    }

    // Accessor to get the amount
    public function getAmountDisplayAttribute()
    {
        if ($this->original_amount) {
            return $this->original_amount;
        }
        
        return $this->service ? $this->service->service_cost : 0;
    }
}