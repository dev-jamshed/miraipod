<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_image extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'make_id',
        'type_id',
        'image'
    ];
}