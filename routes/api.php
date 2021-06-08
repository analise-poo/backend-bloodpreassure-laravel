<?php

use App\Http\Controllers\API\LoginController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\UsersController;

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

Route::get('/hello', function(){
    $measures = collect();

    for ($i=0; $i < 4; $i++) {
        $measures->push([
            'date' => \Carbon\Carbon::now()->subDay($i),
            'syst' => rand(10, 160)
        ]);
    }

    return ['msg' => 'hello, world', 'data' => $measures];
});

// Route::get('users', [UsersController::class, 'index']);
// Route::get('users/{user}', [UsersController::class, 'show']);
// Route::get('users/{user}', function(User $user){
//     return $user;
// });
// Route::post('/users', [UsersController::class, 'create']);

Route::post('register', [RegisterController::class, 'register'])
    ->name('register');

Route::post('login', [LoginController::class, 'login'])
    ->name('login');

Route::resource('users', UsersController::class)
    ->middleware('auth:sanctum'); // 'users.action'
// index GET users - retorna a lista de todos o usuários
// show GET users/user - retorna o usuários de id
// create POST users - cria um novo usuário
// update PUT/PATCH users/user - altera o usuário
// destroy DELETE users - remove o usuário
Route::get('users/details', [UsersController::class, 'details']);

