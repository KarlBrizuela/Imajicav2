<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'booking_id';
    public $timestamps = false;

    protected $fillable = [
        'status',
        'payment',
        'start_date',
        'end_date',
        'id',
        'branch_code',
        'patient_id',
        'useReward',
        'coupon_code',
        'remarks',
        'price',
        // Remove service_id and package_id from fillable since we'll use relationships
    ];
    
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'useReward' => 'boolean',
    ];

    /**
     * Get the services for the booking.
     * Using many-to-many relationship
     */
    public function services()
    {
        return $this->belongsToMany(service::class, 'booking_service', 'booking_id', 'service_id');
    }
    
    /**
     * Get the first service for backward compatibility.
     */
    public function service()
    {
        // Return a proper relationship instead of a model instance
        return $this->belongsToMany(service::class, 'booking_service', 'booking_id', 'service_id')
            ->limit(1);
    }
    
    /**
     * Get the packages for the booking.
     * Using many-to-many relationship
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'booking_package', 'booking_id', 'package_id');
    }
    
    /**
     * Get the first package for backward compatibility.
     */
    public function package()
    {
        // Return a proper relationship instead of a model instance
        return $this->belongsToMany(Package::class, 'booking_package', 'booking_id', 'package_id')
            ->limit(1);
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(branch::class, 'branch_code', 'branch_code');
    }    public function patient()
    {
        return $this->belongsTo(patient::class, 'patient_id', 'patient_id');
    }

    /**
     * Get the notes for this booking.
     */
    public function notes()
    {
        return $this->hasMany(\App\Models\BookingNote::class, 'booking_id', 'booking_id')
            ->orderBy('created_at', 'desc');
    }
}
