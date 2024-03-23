<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\qeueList;
use App\Http\Controllers\ticketList;
use App\Http\Controllers\ticket;


Route::apiResource('list', qeueList::class);

Route::apiResource('list.ticket', ticket::class)->parameters([
    'list' => 'id'
]);

Route::apiResource('list.tickets', ticketList::class)->parameters([
    'list' => 'id'
]);

Route::prefix('list')->group(function () {
    Route::apiResource('store',  qeueList::class);
    Route::apiResource('search', qeueList::class);
});

Route::apiResource('store',  qeueList::class);

Route::prefix('list/{id}/ticket')->group(function () {
    Route::apiResource('update', ticket::class);
    Route::apiResource('submitReply', ticket::class);
    Route::apiResource('deleteTicket', ticket::class);
});
