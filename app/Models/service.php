<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model  // Changed to uppercase 'S' for PSR compliance
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $incrementing = true;

    protected $fillable = [
        'service_name',
        'branch_code',
        'description',
        'service_cost',
    ];

    protected $casts = [
        'service_cost' => 'float'  // Ensures proper numeric handling
    ];

    // Accessor for formatted price display
    public function getFormattedPriceAttribute()
    {
        if (is_null($this->service_cost) || $this->service_cost == 0) {
            return 'Free';
        }
        return '₱' . number_format($this->service_cost, 2);
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