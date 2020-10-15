<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    /**
     * @var DoctorRepository
     */
    private $doctorRepository;

    public function __construct(
        DoctorRepository $doctorRepository
    )
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        $doctors = $this->doctorRepository->get();
        return view('doctors.index')->with(compact(['doctors']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
