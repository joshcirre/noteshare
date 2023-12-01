<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'user_id',
        'body',
        'recipient',
        'published',
        'send_date',
        'heart_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
