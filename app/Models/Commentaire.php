<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'texte',
        'date',
        'id_user',
        'id_event',
    ];

    /**
     * Relation avec le modèle User
     * Un commentaire appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Relation avec le modèle Event
     * Un commentaire appartient à un événement
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
