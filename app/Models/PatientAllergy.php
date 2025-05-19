<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAllergy extends Model
{
    use HasFactory;

    protected $table = 'patient_allergies';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'patient_id',
        'allergen',
        'severity',
        'reaction',
        'date_identified',
       
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }
} 