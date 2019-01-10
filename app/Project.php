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
        'description'
    ];
}
