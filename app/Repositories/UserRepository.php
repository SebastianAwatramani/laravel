<?php
/**
 * Created by PhpStorm.
 * User: Sebastian
 * Date: 1/14/2019
 * Time: 8:16 PM
 */

namespace App\Repositories;


interface UserRepository
{
    public function create($attributes);
}