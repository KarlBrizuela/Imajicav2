<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\category_expense;
use App\Models\branch;

class expenses extends Model
{
    use HasFactory;
    protected $table = 'expenses';
    protected $primaryKey = 'expense_id';
    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [
        'expense_name',
        'category_expense_id',
        'date_expense',
        'expense_cost',
        'payment_status',
        'invoice_number',
        'remarks',
        'branch_code',
    ];
    public function category_expense()
    {
        return $this->belongsTo(category_expense::class, 'category_expense_id', 'category_expense_id');
    }
    
    public function branch()
    {
        return $this->belongsTo(branch::class, 'branch_code', 'branch_code');
    }
}
