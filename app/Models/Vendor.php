<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Vendor extends Authenticatable
{
    use HasFactory;

    protected $guard = "vendor";
    protected $fillable = ['name', 'email', 'password', 'address', 'phone'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
    public function products()
    {
        return $this->hasMany(product::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
