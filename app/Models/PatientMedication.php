<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedication extends Model
{
    use HasFactory;

    protected $table = 'patient_medications';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'patient_id',
        'medication_name',
        'dosage',
        'frequency',
        'start_date',
        'end_date'
       
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }
} 