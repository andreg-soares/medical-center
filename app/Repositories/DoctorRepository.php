<?php

namespace App\Repositories;

use App\Models\Doctor;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
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
