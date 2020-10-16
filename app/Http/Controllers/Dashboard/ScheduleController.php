<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleStoreRequest;
use App\Repositories\DoctorRepository;
use App\Repositories\PatientRepository;
use App\Repositories\ScheduleRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    /**
     * @var ScheduleRepository
     */
    private $scheduleRepository;
    private $patientRepository;
    private $doctorRepository;

    public function __construct(
        ScheduleRepository $scheduleRepository,
        PatientRepository $patientRepository,
        DoctorRepository $doctorRepository
    )
    {
        $this->scheduleRepository = $scheduleRepository;
        $this->patientRepository = $patientRepository;
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        $schedules = $this->scheduleRepository->get();
        return view('schedules.index')->with(compact(['schedules']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = $this->doctorRepository->get();
        $patients = $this->patientRepository->get();
        return view('schedules.from')->with(compact(['doctors','patients']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleStoreRequest $request)
    {
        try{
            $this->scheduleRepository->where('doctor_id',$request->input('doctor'))
                ->where('patient_id',$request->input('patient'))
                ->where('schedule_date',$request->input('schedule_date'))->first();
        }catch (ModelNotFoundException $e){
            $this->scheduleRepository->create([
                'doctor_id'=>$request->input('doctor'),
                'patient_id'=>$request->input('patient'),
                'schedule_date'=>$request->input('schedule_date'),
            ]);
        }
        flash('Salvo Com sucesso')->success();
        return redirect()->route('schedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = $this->scheduleRepository->where('uuid',$id)->first();
        $doctors = $this->doctorRepository->get();
        $patients = $this->patientRepository->get();
        return view('schedules.from')->with(compact(['doctors','patients','schedule']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = $this->scheduleRepository->where('uuid', $id)->first();
        $this->patientRepository->updateById($schedule->id,[
            'doctor_id' => is_null($request->input('doctor'))?$schedule->doctor_id:$request->input('doctor'),
            'patient_id' => is_null($request->input('patient'))?$schedule->patient_id:$request->input('patient'),
            'schedule_date' => is_null($request->input('schedule_date'))?$schedule->schedule_date:$request->input('schedule_date'),
            ]);
        flash('Editado Com sucesso')->success();
        return redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->scheduleRepository->where('uuid',$id)->delete();
        flash('Deletado Com sucesso')->success();
        return redirect()->route('schedules.index');
    }
}
