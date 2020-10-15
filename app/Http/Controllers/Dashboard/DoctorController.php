<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorStoreRequest;
use App\Repositories\AddressRepository;
use App\Repositories\DoctorRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    /**
     * @var DoctorRepository
     */
    private $doctorRepository;

    public function __construct(
        DoctorRepository $doctorRepository,
        AddressRepository $addressRepository
    )
    {
        $this->doctorRepository = $doctorRepository;
        $this->addressRepository = $addressRepository;
    }

    public function index()
    {
        $doctors = $this->doctorRepository->get();
        return view('doctors.index')->with(compact(['doctors']));
    }

    public function create()
    {
        return view('doctors.form');
    }

    public function store(DoctorStoreRequest $request)
    {
        $address = $this->createAddress($request);
        $doctors = $this->doctorRepository->create($this->values($request,$address->id));
        flash('Salvo Com sucesso')->success();
        return redirect()->route('doctors.index');
    }

    public function edit($id)
    {
        $doctor = $this->doctorRepository->with(['address'])->where('uuid', $id)->first();
        return view('doctors.form')->with(compact(['doctor']));
    }

    public function update(Request $request, $id)
    {
        $doctor = $this->doctorRepository->where('uuid', $id)->first();
        $address = $this->createAddress($request);
        $this->doctorRepository->updateById($doctor->id,[
            'name' => is_null($request->input('name'))?$doctor->name:$request->input('name'),
            'cpf' => is_null(preg_replace('/\D/', '', $request->input('cpf')))?$doctor->cpf:preg_replace('/\D/', '', $request->input('cpf')),
            'crm' => is_null($request->input('crm'))?$doctor->crm:$request->input('crm'),
            'number_home' => is_null($request->input('number_home'))?$doctor->number_home:$request->input('number_home'),
            'complement' => is_null($request->input('complement'))?$doctor->complement:$request->input('complement'),
            'email' => is_null($request->input('email'))?$doctor->email:$request->input('email'),
            'address_id' => $address->id,
            'cellphone' => is_null(preg_replace('/\D/', '', $request->input('cellphone')))?$doctor->cellphone:preg_replace('/\D/', '', $request->input('cellphone')),
        ]);
        flash('Editado Com sucesso')->success();
        return redirect()->route('doctors.index');
    }

    public function destroy($id)
    {
        $this->doctorRepository->where('uuid',$id)->delete();
        flash('Deletado Com sucesso')->success();
        return redirect()->route('doctors.index');
    }

    private function values(Request $request,$address_id)
    {

        return [
            'name' => $request->input('name'),
            'cpf' => preg_replace('/\D/', '', $request->input('cpf')),
            'crm' => $request->input('crm'),
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
