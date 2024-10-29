<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquiryReply extends Model
{
    use HasFactory;
    protected $fillable = [
        'inquiry_id', // Add this line
        'user_id',
        'message',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
