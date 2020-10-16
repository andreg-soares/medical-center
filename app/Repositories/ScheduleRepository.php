<?php

namespace App\Repositories;

use App\Models\Schedule;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ScheduleRepository.
 */
class ScheduleRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Schedule::class;
    }
}
