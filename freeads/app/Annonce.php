<?php

namespace App;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;


class Annonce extends Model
{
    use Rateable;

    protected $fillable = [
        'user_id',
        'categorie',
        'note',
        'titre',
        'description',
        'taille',
        'couleur',
        'prix',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
