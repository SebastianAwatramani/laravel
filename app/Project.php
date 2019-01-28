<?php
//Created with php artisan make:model Project


namespace App;

use Illuminate\Database\Eloquent\Model;

//Ignored _ide_helper_models.php to get this to stop throwing a multiple definitions for class warning

class Project extends Model
{
    //with $fillable[], we say which fields are fillable
    //with $guarded[], we say to accept everything EXCEPT for these fields
    //In my estimation, $fillable seems to be more secure and to take less work.  With $guarded[], it seems I'd have to always remember to specify all the protected fields
    protected $fillable = [
        'title',
        'description',
        'owner_id'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask(array $taskAttributes)

    {
//        So the way I think this works is that the above tasks() returns a reference to a Task() class, then it runs the model::create() and passes along the description.
//        It also automatically includes the $project_id of the current project because laravel realizes that this is necessary.  Probably defined in the task-project
//    relationship somewhere, but I wasn't able to figure it out'
        $this->tasks()->create($taskAttributes);
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
