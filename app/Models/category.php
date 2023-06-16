<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['name','image'];
    
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = ImageHelper::saveImage($value, 'image');
    }
    public function getImageAttribute($value)
    {
        return asset($value);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
