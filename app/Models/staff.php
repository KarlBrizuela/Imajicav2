<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'image_path',
        'firstname',
        'lastname',
        'email',
        'contact_number',
        'position_id',
        'department_code',
        'join_date',
        'employment_type',
        'branch_code',
        'address',
        'emergency_contact_name',
        'emergency_contact_number',
    ];

    /**
     * Get the branch associated with the staff.
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    

    /**
     * Get the bookings for the staff.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id', 'id');
    }

    /**
     * Get the departments where this staff member is the head.
     */
    public function departments()
    {
        return $this->hasMany(Department::class, 'department_head');
    }
    
public function position()
    {
        return $this->belongsTo(positionModel::class, 'position_id', 'position_id');
    }


    public function department()
    {
        return $this->belongsTo(Department::class, 'department_code', 'department_code');
    }
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
