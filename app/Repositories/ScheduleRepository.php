<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\BaseRepository\BaseRepository;
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
