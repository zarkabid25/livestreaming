<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livestream extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'embed_url', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
