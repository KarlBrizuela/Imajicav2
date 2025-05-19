<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAttachment extends Model
{
    use HasFactory;
    protected $table = 'patient_attachments';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'patient_id',
        'filename',
        'filepath',
        'file_type',
        'filesize',
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'filesize' => 'integer'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }
    
    public function getFileSizeForHumans()
    {
        $bytes = $this->filesize;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
    
        return round($bytes, 2) . ' ' . $units[$i];
    }
}
