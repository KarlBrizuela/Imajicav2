<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'package_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'package_name',
        'branch_code',
        'description',
        'inclusions',
        'free',
        'price',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'inclusions' => 'array',
    ];
    
    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    /**
     * Handle the inclusions data before saving to the database.
     *
     * @param mixed $value
     * @return string
     */
    public function setInclusionsAttribute($value)
    {
        $this->attributes['inclusions'] = is_array($value) ? json_encode($value) : $value;
    }
    
    /**
     * Retrieve the inclusions data from the database.
     *
     * @param string $value
     * @return array
     */
    public function getInclusionsAttribute($value)
    {
        return is_string($value) ? json_decode($value, true) : $value;
    }
    
    /**
     * Get the branch that owns the package.
     */
    public function branch()
    {
        return $this->belongsTo(branch::class, 'branch_code', 'branch_code');
    }
    
    /**
     * Get the services included in this package.
     */
    public function services()
    {
        return $this->belongsToMany(service::class, 'package_service', 'package_id', 'service_id');
    }
}
