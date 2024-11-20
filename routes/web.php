<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketingController;

// Route::get('/', function () {
    // return view('welcome');
// });
    Route::get ('/ticket/create',[TicketingController::class, 'create' ])->name('ticket.create');
    Route::post('/ticket/store' ,[TicketingController::class, 'store'  ])->name('ticket.store');
    Route::get ('ticket'        ,[TicketingController::class,'index'   ])->name('ticket');
    Route::get('ticket/edit/{id}', [TicketingController::class, 'edit'])->name('edit.ticket');
    Route::delete('ticket/delete/{id}', [TicketingController::class, 'delete'])->name('delete.ticket');
    Route::get ('ticket/update/{id}',[TicketingController::class,'page_update'   ])->name('page_update.ticket');
    Route::PUT ('ticket/update/{id}',[TicketingController::class,'update'   ])->name('update.ticket');
