<?php

namespace App\Models\Admin;

use App\Models\Admin\Make;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarsModel extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $fillable = ['name', 'slug', 'make_id', 'status'];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
