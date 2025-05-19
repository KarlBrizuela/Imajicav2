<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
use App\Models\Department;

class positionModel extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $primaryKey = 'position_id';
    public $incrementing = false;
    protected $keyType = 'bigInteger';
    public $timestamps = false; // Fixed typo from "falsse" to "false"
    protected $fillable = [
        'position_id',
        'position_name',
        'department_code',
        'description',
        'status'
    ];

        // // Add this if your timestamp column names are different
        // const CREATED_AT = 'created_at';
        // const UPDATED_AT = 'updated_at';

    protected $casts = [
        'status' => 'boolean'
    ];

    public function staff()
    {
        return $this->hasMany(Staff::class, 'position_id', 'position_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_code', 'department_code');
    }

}
