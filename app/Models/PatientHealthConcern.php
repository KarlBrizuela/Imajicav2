<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHealthConcern extends Model
{
    use HasFactory;

    protected $table = 'health_concerns';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'patient_id',
        'concern',
        'status',
        'date_reported'

    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }
} 