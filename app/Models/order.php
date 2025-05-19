<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'new_order_table';
    protected $primaryKey = 'order_id';
    public $timestamps = true;
    
    protected $fillable = [
        'order_number',
        'order_date',
        'order_time',
        'customer_name',
        'customer_email',
        'payment_status', 
        'order_status',
        'payment_method',
        'payment_method_details',
        'subtotal',
        'tax',
        'total'
    ];

    // Add relationship
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($order) {
            $order->order_number = static::generateOrderNumber();
        });
    }

    private static function generateOrderNumber()
    {
        $prefix = 'ORD';
        $year = date('Y');
        $month = date('m');
        
        // Get the last order for the current month
        $lastOrder = static::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->latest()
            ->first();

        if (!$lastOrder) {
            $nextNumber = 1;
        } else {
            // Extract the numeric part and increment
            $lastNumber = (int) substr($lastOrder->order_number, -4);
            $nextNumber = $lastNumber + 1;
        }

        // Format: ORD-YYYYMM-XXXX (XXXX is a 4-digit sequential number)
        return sprintf('%s-%s%s-%04d', $prefix, $year, $month, $nextNumber);
    }
}
