<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'inscriptions';

    protected $fillable = [
        'date_inscription', 'id_user', 'id_event'
    ];

    // Relationship: an Inscription belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relationship: an Inscription belongs to an Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
