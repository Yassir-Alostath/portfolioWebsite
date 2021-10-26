<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgencyController;

Route::prefix('agency')->group(function(){

    Route::get('/home',[AgencyController::class,'index'])->name('index');
}); 