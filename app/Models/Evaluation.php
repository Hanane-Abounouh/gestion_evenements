<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'note',
        'id_user',
        'id_event',
    ];

    /**
     * Relation avec le modèle User
     * Une évaluation appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Relation avec le modèle Event
     * Une évaluation est liée à un événement
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
