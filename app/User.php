<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function owns(Project $project, User $user)
    {
        return $project->owner_id == $user->id;
    }

    public function projects()
    {
        //create relationship with users and projects
        //Makes it easier to get projects.  More readable code.
        //Laravel is using 'user_id' as FK in projects table, but we call it 'owner_id', so we need to override in function argument
        return $this->hasMany(Project::class, 'owner_id');

    }
}
