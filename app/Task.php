<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'completed',
        'project_id',
        'description'
    ];

    public function project()
    {

        return $this->belongsTo(Project::class);
    }

    public function incomplete()
    {
        $this->complete(false);
    }

    public function complete($completed = true)
    {

        //This wasn't working before because I was passing in $completed.  I need to pass the var name as a string

        $this->update(compact('completed'));
    }

}
