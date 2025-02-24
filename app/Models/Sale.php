<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'goods_id',
        'employee_id',
        'quantity',
        'total_price',
    ];

    public function goods()
    {
        return $this->belongsTo(Goods::class,'goods_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
