<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Car;

class Inquiry extends Model
{
    use HasFactory;
    
      public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
    public function replies()
{
    return $this->hasMany(InquiryReply::class);
}
}
