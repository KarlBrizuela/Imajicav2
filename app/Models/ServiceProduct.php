<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProduct extends Model
{
    use HasFactory;

    protected $table = 'service_products';
    protected $fillable = [
        'service_name',
        'date',
        'branch_name',
        'description',
        'service_category',
        'service_cost',
        'type'
        ];

    // Optional: If you don't have standard Laravel timestamps (created_at, updated_at)
    public $timestamps = false;

    // Helper function to format the cost
    public function getFormattedCostAttribute()
    {
        return '₱' . number_format($this->service_cost, 2);
    }
}
