<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


if (isset($_SERVER['HTTP_ORIGIN'])) {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: content-type, cache-control, postman-token, Authorization, X-Requested-With');
    header('Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE');
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header('Content-Type: application/json');
        header('HTTP/1.1 204 OK');
        exit();
    }
}
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('', function ()
{
    return response()->json([
        'author'  => 'Andre Soares',
        'Message' => 'Medical Center Api - Teste Mazza',
    ]);
});

Route::get('doctors', 'Api\DoctorController@index')
    ->name('api.doctors.index');
