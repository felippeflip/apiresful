<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::resources([
        'products' => ProductController::class,
        'users' => UserController::class,
    ]);
});


Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));
 
    $query = http_build_query([
        'client_id' => '4',
        'redirect_uri' => 'http://meusite.com/pagina-de-login',
        'response_type' => 'token',
        'scope' => '',
        'state' => $state,
    ]);
 
    return redirect('http://127.0.0.1:8000/oauth/authorize?'.$query);
});