<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'unit', 'stock', 'image1', 'image2', 'image3',  'description', 'discount', 'category_id', 'user_id'];

    public function setImage1Attribute($value)
    {
        $this->attributes['image1'] = ImageHelper::saveImage($value, 'image');
    }
    public function getImage1Attribute($value)
    {
        return asset($value);
    }
    public function setImage2Attribute($value)
    {
        $this->attributes['image2'] = ImageHelper::saveImage($value, 'image');
    }
    public function getImage2Attribute($value)
    {
        return asset($value);
    }
    public function setImage3Attribute($value)
    {
        $this->attributes['image3'] = ImageHelper::saveImage($value, 'image');
    }
    public function getImage3Attribute($value)
    {
        return asset($value);
    }
    public static function countProductsByUserId($userId)
    {
        return self::where('user_id', $userId)->count();
    }
}
