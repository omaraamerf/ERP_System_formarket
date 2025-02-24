<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class financial_data extends Model
{
    use HasFactory;
    protected $fillable = ['total_salaries', 'total_sales', 'total_due', 'report_date'];
    public function purchases() {
        return $this->hasMany(PurchaseInvoice::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'financial_data_employee', 'financial_data_id', 'employee_id')
                    ->withPivot('salary');
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'financial_data_sale', 'financial_data_id', 'sale_id')
                    ->withPivot('total_price');
    }
    public function suppliers()
    {
        return $this->hasManyThrough(Supplier::class, PurchaseInvoice::class, 'financial_data_id', 'id', 'id', 'supplier_id');
    }

}
