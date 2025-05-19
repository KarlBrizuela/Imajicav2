<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\branch;
class coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';
    protected $primaryKey = 'coupon_code';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'coupon_code',
        'discount_name',
        'description',
        'discount_type',
        'discount_value',
        'service_id',
        'start_end_date',
        'new_customer',
        'branch_code'
    ];

    public function service()
    {
        
        return $this->belongsTo(service::class, 'service_id', 'service_id');
    }

    
        public function branch()
        {
            return $this->belongsTo(branch::class, 'branch_code', 'branch_code');
        }
}
