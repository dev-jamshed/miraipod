<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPartsDescription extends Model
{
    use HasFactory;
    protected $table = 'auto_parts_description';

    // Fillable fields
    protected $fillable = [
        'description',
    ];
}
