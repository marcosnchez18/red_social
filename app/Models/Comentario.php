<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function twit()
    {
        return $this->belongsTo(Twit::class);
    }

    public function coments()
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }

    public function comentable()
    {
        return $this->morphTo();
    }
}
