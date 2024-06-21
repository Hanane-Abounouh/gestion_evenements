<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = 'commentaires'; // Si le nom de la table est différent de commentaires

    protected $fillable = ['texte', 'id_user', 'id_event']; // Les attributs remplissables

    // Relations éventuelles avec d'autres modèles, par exemple :
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
