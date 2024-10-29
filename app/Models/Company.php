<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'email_1',
        'email_2',
        'phone_1',
        'phone_2',
        'office_address',
    ];
}
