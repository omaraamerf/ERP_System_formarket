<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'contact_info'];



    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
