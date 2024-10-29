<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inquiry;

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
        'status',
        'negotiation',
        'featured',
        'make_id',
        'model_id',
        'showChassis',
        'yt_link',
        'wheels'
    ];
    public function carImages()
    {
        return $this->hasMany(Item_image::class);
    }
    public function make()
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    public function model()
    {
        return $this->belongsTo(CarsModel::class, 'model_id');
    }
    public function type()
{
    return $this->belongsTo(Type::class, 'body_type');
}

    // Define the relationship to the Inquiry model
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class, 'car_id');
    }

}
