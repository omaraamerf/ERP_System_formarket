<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['goods_id', 'location', 'stock_available'];

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
