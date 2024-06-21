<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'titre', 'description', 'date', 'heure', 'lieu', 'prix', 'image', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function comments()
    {
        return $this->hasMany(Commentaire::class, 'id_event')->latest();
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'id_event')->latest();
    }
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'id_event');
    }
}
