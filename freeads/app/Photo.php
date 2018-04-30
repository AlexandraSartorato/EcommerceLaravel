<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'user_id',
        'annonce_id',
        'photographie',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
