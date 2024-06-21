<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // User.php model
public function events()
{
    return $this->hasMany(Event::class, 'id_user'); // Adjust as per your actual foreign key
}


    public function isAdmin()
    {
        return $this->role === 'admin'; // Adjust 'admin' to match your role definition
    }

    /**
     * Check if the user is a regular user.
     *
     * @return bool
     */
    public function isUser()
    {
        return $this->role === 'user'; // Adjust 'user' to match your role definition
    }
}
