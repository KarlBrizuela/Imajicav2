<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $incrementing = true;

    // Fixed: Proper default attributes syntax
    protected $attributes = [
        'acq_pts' => 0,  // Use the correct field name and proper syntax
    ];

    // Fixed: Make sure field name matches your database column
    protected $fillable = [
        'service_name',
        'branch_code',
        'description',
        'service_cost',
        'acq_pts'  // Changed from 'acq_points' to 'acq_point' to match your database
    ];

    protected $casts = [
        'service_cost' => 'float',
        'acq_pts' => 'integer'  // Added casting for acq_point
    ];

    // Accessor for formatted price display
    public function getFormattedPriceAttribute()
    {
        if (is_null($this->service_cost) || $this->service_cost == 0) {
            return 'Free';
        }
        return '₱' . number_format($this->service_cost, 2);
    }

    // Accessor for acq_point to ensure it's never null
    public function getAcqPointAttribute($value)
    {
        return $value ?? 0;
    }

    // Mutator to ensure acq_point is properly set
    public function setAcqPointAttribute($value)
    {
        $this->attributes['acq_pts'] = (int) $value;
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_code', 'branch_code');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'service_id', 'service_id');
    }

    public function coupon()
    {
        return $this->hasMany(Coupon::class, 'service_id', 'service_id');
    }
}