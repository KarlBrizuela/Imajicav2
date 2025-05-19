<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;

    protected $table = 'branches';
    protected $primaryKey = 'branch_code';
    public $incrementing = false;
    protected $keyType = 'bigInteger';
    public $timestamps = false;

    protected $fillable = [
        'branch_code',
        'branch_name',
        'address',
    ];

    public function service()
    {
        return $this->hasMany(Service::class, 'branch_code', 'branch_code');
    }

    public function staff() 
    {
        return $this->hasMany(Staff::class, 'branch_code', 'branch_code');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'branch_code', 'branch_code');
    }

    public function coupon() {
        return $this->hasMany(coupon::class, 'branch_code', 'branch_code');
    }

    public function expenses() {
        return $this->hasMany(expenses::class, 'branch_code', 'branch_code');
    }
}
