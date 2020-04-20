<?php

use App\Mail\newLaravelTips;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'namespace' => 'admin', 'prefix' => 'admin'], function () {

    // admin routes
    Route::get('/', 'AdminController@index')->name('home');

    // Balance routes
    Route::get('balance', 'BalanceController@index')->name('balance');

    // whitdraw routes
    Route::get('withdrawn', 'BalanceController@withdrawn')->name('withdrawn');
    Route::post('withdrawn', 'BalanceController@withdrawnStore')->name('withdrawn.store');

    // transfer routes
    Route::get('transfer', 'BalanceController@transfer')->name('transfer');
    Route::post('transfer-confirm', 'BalanceController@transferConfirm')->name('transfer.confirm');
    Route::post('transfer', 'BalanceController@transferStore')->name('transfer.store');
    Route::get('mailer-confirm', 'UserController@confirmTransfer')->name('transfer.mailer');


    // deposit routes
    Route::get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');
    Route::post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');

    // historic routes
    Route::get('historic', 'BalanceController@historic')->name('historic');
    Route::any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');
});

// Home profile
Route::get('meu-perfil', 'admin\UserController@profile')->name('profile')->middleware('auth');
Route::post('atualizar-perfil', 'admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');

// Home
Route::get('/', 'Site\SiteController@index')->name('site.index');

// Auth routes
Auth::routes();

//test


