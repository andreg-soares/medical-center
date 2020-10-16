<?php

namespace App\Repositories;

use App\Models\Patient;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class PatientRepository.
 */
class PatientRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Patient::class;
    }
}
