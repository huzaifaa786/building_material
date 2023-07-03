<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_id',
        'qty',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function products(){
        return $this->belongsTo(product::class,'product_id');
    }
}
