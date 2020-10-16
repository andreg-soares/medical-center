<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository\BaseRepository;
//use Your Model

/**
 * Class UsersRepository.
 */
class UsersRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }
}
