<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'thumbnail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtTzAttribute($value)
    {
        $date = \Carbon\Carbon::parse($value);
        $date->setTimezone('Asia/Jakarta');

        return $date->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtTzAttribute($value)
    {
        $date = \Carbon\Carbon::parse($value);
        $date->setTimezone('Asia/Jakarta');
        
        return $date->format('d/m/Y H:i:s');
    }
}
