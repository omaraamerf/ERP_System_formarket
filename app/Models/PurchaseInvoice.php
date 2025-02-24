<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model {
    use HasFactory;
    protected $fillable = ['supplier_id', 'total_amount', 'invoice_date'];
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}



