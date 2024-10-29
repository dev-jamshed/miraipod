<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table ='types';
    protected $fillable = [
        'name',
        'slug',
        'status'
    ];
    public function typeImages()
    {
        return $this->hasMany(Item_image::class);
    }
    public function cars()
{
    return $this->hasMany(Car::class, 'body_type');
}
}
