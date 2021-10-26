<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

    Route::get('/', [PortfolioController::class, 'home'])->name('home');

    Route::prefix('portfolio')->group(function (){
        Route::get('/', [PortfolioController::class, 'index'])->name ('index');
        Route::get('/about', [PortfolioController::class, 'about'])->name ('about');
        Route::get('/contact', [PortfolioController::class, 'contact'])->name ('contact');
        Route::get('/portfolio', [PortfolioController::class, 'portfolio'])->name ('portfolio');
        //defining post route for the form
        Route::post('/contact',[PortfolioController::class, 'contactSub'])->name('contactSub');

});

