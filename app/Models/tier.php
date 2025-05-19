<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tier extends Model
{
    use HasFactory;
    protected $primaryKey = 'patient_tier_id';
    public $timestamps = false;
    protected $fillable = [
        'tier_name',
        'points_required',
        'points_to_redeem',
        'tier_lenght',
        'remarks',
    ];

    public function patient()
    {
        return $this->hasMany(Patient::class, 'patient_tier_id', 'patient_tier_id');
    }
   
}
