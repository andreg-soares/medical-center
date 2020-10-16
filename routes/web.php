<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth'])
    ->group(function (){
        Route::post('address/postcode','Dashboard\AddressController@postCode')->name('dashboard.postcode');
        Route::resource('doctors','Dashboard\DoctorController')->names([
            'index'   => 'doctors.index',
            'create'  => 'doctors.create',
            'store'   => 'doctors.store',
            'edit'    => 'doctors.edit',
            'update'  => 'doctors.update',
            'destroy' => 'doctors.destroy',
        ]);
        Route::resource('patients','Dashboard\PatientController')->names([
            'index'   => 'patients.index',
            'create'  => 'patients.create',
            'store'   => 'patients.store',
            'edit'    => 'patients.edit',
            'update'  => 'patients.update',
            'destroy' => 'patients.destroy',
        ]);
        Route::resource('schedules','Dashboard\ScheduleController')->names([
            'index'   => 'schedules.index',
            'create'  => 'schedules.create',
            'store'   => 'schedules.store',
            'edit'    => 'schedules.edit',
            'update'  => 'schedules.update',
            'destroy' => 'schedules.destroy',
        ]);
    });
