<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'patient_id';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'contact_number',
        'birthdate',
        'gender',
        'occupation',
        'address',
        'points',
        'total_cost',
        'emergency_contact_name',
        'emergency_contact_number',
        'medical_concerns',
        'current_medications',
        'note_from_admin',
        'image_path',
    ];

    protected $attributes = [
        'image_path' => null,
        'emergency_contact_name' => null,
        'emergency_contact_number' => null,
        'medical_concerns' => null,
        'current_medications' => null,
        'note_from_admin' => null,
       
        'points' => 0,
        'total_cost' => 0
    ];

    public function contact()
    {
        return $this->hasOne(Contact::class, 'patient_id', 'patient_id');
    }

    public function tier(): BelongsTo
    {
        return $this->belongsTo(tier::class, 'patient_tier_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'patient_id', 'patient_id');
    }
}
