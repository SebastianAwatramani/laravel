<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 1/14/2019
 * Time: 8:16 PM
 */

namespace App\Repositories;


class DbUserRepository implements UserRepository
{

    public function create($attributes)
    {
        dd('dreating the user');
    }
}