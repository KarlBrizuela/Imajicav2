<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $primaryKey = 'suppler_id';
    public $timestamps = false; // Disable timestamps
    
    protected $fillable = [
        'supplier_name',
        'company',
        'contact_person',
        'address',
        'mobile_number',
        'email',
        'description'
    ];
}
