<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // Add 'name' here
        'chassis_no',
        'stock_id',
        'body_type',
        'year_month',
        'model_grade',
        'slug',
        'engine_type',
        'drive',
        'transmission',
        'condition',
        'color',
        'doors',
        'seats',
        'm3',
        'fob_price',
        'show_cnf_price',
        'fuel',
        'mileage',
        'cc',
        'status'
    ];
    public function carImages()
    {
        return $this->hasMany(Item_image::class);
    }
}
