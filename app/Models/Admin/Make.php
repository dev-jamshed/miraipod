<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug','status'];

    public function makeImages()
    {
        return $this->hasMany(Item_image::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'make_id');
    }

}
