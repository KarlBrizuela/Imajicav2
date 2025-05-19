<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'categoryTitle',
        'slug',
        'description',
        'categoryImage',
    ];

    public function products()
    {
        return $this->hasMany(product::class, 'category_id', 'category_id');
    }

    public function getTotalEarningsAttribute()
    {
        return $this->products()
            ->join('order_items', 'new_product.name', '=', 'order_items.item_name') 
            ->sum('order_items.total');
    }

    public function getProductsCountAttribute()
    {
        return $this->products()->count();
    }
}
