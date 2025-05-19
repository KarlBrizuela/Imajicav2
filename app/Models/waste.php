<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class waste extends Model
{
    use HasFactory;
    protected $table = 'wastes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'quantity',
        'reason',
        'date_added'
    ];
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

}
