<?php
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TicketingController;
use App\Http\Controllers\AuthController;

Route::get   ('ticket/ShowAll'            ,[TicketingController::class,'index'   ]);
Route::get   ('ticket/show/{id}',[TicketingController::class,'show'  ]);
Route::post   ('ticket/search', [TicketingController::class,'search']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post   ('/ticket/create'    ,[TicketingController::class, 'create' ]);
    Route::delete('ticket/delete/{id}',[TicketingController::class, 'delete' ]);
    Route::put   ('ticket/update/{id}',[TicketingController::class,'update'  ]);



});
