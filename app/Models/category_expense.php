<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_expense extends Model
{
    use HasFactory;

    protected $table = 'category_expenses';
    protected $primaryKey = 'category_expense_id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
    ];


    public function expenses()
    {
        return $this->hasMany(expenses::class, 'category_expense_id', 'category_expense_id');
    }
}
