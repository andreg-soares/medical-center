<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function __construct(
        DoctorRepository $doctorRepository
    )
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        $doctors = $this->doctorRepository->get();
        if(!$doctors){
            return response()->json('nao madicos cadastrados ', 404);
        }
        return response()->json($doctors, 200);
    }
}
