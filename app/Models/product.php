<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'new_product';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // Disable timestamps
    protected $fillable = [
        'sku',
        'name',
        'product_image',
        'category_id',
        'supplier_id',
        'base_price',
        'quantity',
        'restock_point', 
        'manufacturing_date',
        'expiry_date',
        'removal_date'
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'category_id');
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'supplier_id', 'suppler_id');
    }
}
