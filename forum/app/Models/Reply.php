<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['topic_id', 'user_id', 'body'];

    // Relacionamento com Topic
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    // Relacionamento com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
