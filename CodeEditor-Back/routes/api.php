<?php

use App\Http\Controllers\CodesubmissionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


        Route::post("chat/createChat", [ChatController::class, "createChat"]);
        

Route::get("chat/user/{id}", [ChatController::class, "getAllChats"]);
Route::middleware('auth:api')->group(function () {

Route::prefix('message')->group(function () {
});
});
Route::post("message/createMessage/{chat_id}", [\App\Http\Controllers\MessageController::class, "createMessage"]);
Route::get("message/get/{chat_id}", [App\Http\Controllers\MessageController::class, "getMessages"]);


Route::prefix('user')->group(function () {
    Route::post("/createUser", [\App\Http\Controllers\UserController::class, "createUser"]);
    Route::get("/{id}", [App\Http\Controllers\UserController::class, "readUser"]);
    Route::get("/", [App\Http\Controllers\UserController::class, "readAllUsers"]);
    Route::post('/bulk-import', [UserController::class, 'bulkImport']);
    
});

Route::prefix('code')->group(function () {
    Route::middleware('auth:api')->get('/userCodes', [CodesubmissionController::class, 'getUserCodes']);
    Route::post("/createCode", [\App\Http\Controllers\CodesubmissionController::class, "createCode"]);
    Route::get("/{id}", [App\Http\Controllers\CodesubmissionController::class, "readCode"]);
    Route::get("/", [App\Http\Controllers\CodesubmissionController::class, "readAllCodes"]);
    Route::delete("/{id}", [App\Http\Controllers\CodesubmissionController::class, "deleteCode"]);

});


Route::post("getSuggestions", [\App\Http\Controllers\CopilotController::class, "getSuggestions"]);
    










// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });+