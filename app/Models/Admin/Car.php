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
}
