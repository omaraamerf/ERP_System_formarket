<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = ['name', 'price', 'supplier_id', 'stock_level'];



    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
