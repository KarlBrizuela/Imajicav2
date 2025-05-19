<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';
    protected $primaryKey = 'position_id';
    public $timestamps = true;

    protected $fillable = [
        'position_name',
        'department',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}
