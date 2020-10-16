<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientStoreRequest;
use App\Repositories\AddressRepository;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function __construct(
        PatientRepository $patientRepository,
        AddressRepository $addressRepository
    )
    {
        $this->patientRepository = $patientRepository;
        $this->addressRepository = $addressRepository;
    }

    public function index()
    {
        $patients = $this->patientRepository->get();
        return view('patients.index')->with(compact(['patients']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientStoreRequest $request)
    {
        $address = $this->createAddress($request);
        $this->patientRepository->create($this->values($request,$address->id));
        flash('Salvo Com sucesso')->success();
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = $this->patientRepository->with(['address'])->where('uuid', $id)->first();
        return view('patients.form')->with(compact(['patient']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = $this->patientRepository->where('uuid', $id)->first();
        $address = $this->createAddress($request);
        $this->patientRepository->updateById($patient->id,[
            'name' => is_null($request->input('name'))?$patient->name:$request->input('name'),
            'cpf' => is_null(preg_replace('/\D/', '', $request->input('cpf')))?$patient->cpf:preg_replace('/\D/', '', $request->input('cpf')),
            'number_home' => is_null($request->input('number_home'))?$patient->number_home:$request->input('number_home'),
            'complement' => is_null($request->input('complement'))?$patient->complement:$request->input('complement'),
            'email' => is_null($request->input('email'))?$patient->email:$request->input('email'),
            'address_id' => $address->id,
            'cellphone' => is_null(preg_replace('/\D/', '', $request->input('cellphone')))?$patient->cellphone:preg_replace('/\D/', '', $request->input('cellphone')),
        ]);
        flash('Editado Com sucesso')->success();
        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->patientRepository->where('uuid',$id)->delete();
        flash('Deletado Com sucesso')->success();
        return redirect()->route('patients.index');
    }

    private function values(Request $request,$address_id){

        return [
            'name' => $request->input('name'),
            'cpf' => preg_replace('/\D/', '', $request->input('cpf')),
            'number_home' => $request->input('number_home'),
            'complement' => $request->input('complement'),
            'email' => $request->input('email'),
            'address_id' => $address_id,
            'cellphone' => preg_replace('/\D/', '', $request->input('cellphone')),
        ];

    }

    private function createAddress(Request $request)
    {

        $address = $this->addressRepository->where('postcode', $request->input('postcode'), '=')->get();
        if(count($address)){
            return $address;
        }else{
            $address = $this->addressRepository->create([
                'street' => $request->input('street'),
                'city' => $request->input('city'),
                'neighborhood' => $request->input('neighborhood'),
                'postcode' => preg_replace('/\D/', '', $request->input('postcode')),
                'uf' => $request->input('uf'),
            ]);
            return $address;
        }


    }
}
