<?php

namespace App\Repositories;

use App\Models\Doctor;
use App\Repositories\BaseRepository\BaseRepository;
//use Your Model

/**
 * Class DoctorRepository.
 */
class DoctorRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Doctor::class;
    }
}
