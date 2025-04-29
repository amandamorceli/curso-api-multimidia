<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('v1')->group(function () {

    /** User CRUD */
    Route::get('/users', function (Request $request) {

        $users = User::all();
        
        $message = count($users === 0 ? 'Nenhum registro encontrado!' : 'Registros de usuários encontrados!');

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => $message,
            'date' => $users
        ]);
    
    })->middleware('auth:sanctum');

    Route::post('/login', [UserController::class, 'login']);
    Route::post('/logout', [UserController::class, 'login']);

});

