<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'date',
        'heure',
        'lieu',
        'prix',
        'id_user',
    ];

    /**
     * Relation avec le modèle User
     * Un événement appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
