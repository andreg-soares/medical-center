<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct(
        UsersRepository $usersRepository
    )
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->usersRepository->get();
        return view('users.index')->with(compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $this->usersRepository->create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> bcrypt($request->input('password')),
        ]);
        flash('Salvo Com sucesso')->success();
        return redirect()->route('users.index');
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
        $user = $this->usersRepository->where('id',$id)->first();
        return view('users.form')->with(compact(['user']));
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
        $user = $this->usersRepository->where('id',$id)->first();
        $this->usersRepository->updateById($user->id,[
            'name'=> is_null($request->input('name'))?$user->name:$request->input('name'),
            'email'=> is_null($request->input('email'))?$user->email:$request->input('email'),
            'password'=> is_null($request->input('password'))?$user->password:bcrypt($request->input('password')),
        ]);
        flash('Editado Com sucesso')->success();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->usersRepository->deleteById($id);
        flash('Deletado Com sucesso')->success();
        return redirect()->route('users.index');
    }
}
