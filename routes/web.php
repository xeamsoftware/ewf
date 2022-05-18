<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::post('/login', 'LoginController@dologin')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::prefix('incentive')->group(function () {
        Route::get('/create', 'IncentiveController@create')->name('incentive.create');
        Route::post('/save', 'IncentiveController@save')->name('incentive.save');
        Route::get('/list', 'IncentiveController@list')->name('incentive.list');
        Route::get('/view/{id}', 'IncentiveController@view')->name('incentive.view');
        Route::get('/edit/{id}', 'IncentiveController@edit')->name('incentive.edit');
        Route::post('/update/{id}', 'IncentiveController@update')->name('incentive.update');
        Route::get('/delete/{id}', 'IncentiveController@delete')->name('incentive.delete');
        Route::get('/changeStatus', 'IncentiveController@changeStatus');
        Route::get('/incentive-filter', 'IncentiveController@incentiveFilter');
    });


    Route::prefix('document')->group(function () {
        Route::get('/create', 'DocumentController@create')->name('document.create');
        Route::post('/save', 'DocumentController@save')->name('document.save');
        Route::get('/list', 'DocumentController@list')->name('document.list');
        Route::get('/view/{id}', 'DocumentController@view')->name('document.view');
        Route::get('/edit/{id}', 'DocumentController@edit')->name('document.edit');
        Route::post('/update/{id}', 'DocumentController@update')->name('document.update');
        Route::get('/delete/{id}', 'DocumentController@delete')->name('document.delete');
    });

    Route::prefix('company')->group(function () {
        Route::get('/create', 'CompanyController@create')->name('company.create');
        Route::post('/save', 'CompanyController@save')->name('company.save');
        Route::get('/list', 'CompanyController@list')->name('company.list');
        Route::get('/view/{id}', 'CompanyController@view')->name('company.view');
        Route::get('/edit/{id}', 'CompanyController@edit')->name('company.edit');
        Route::post('/update/{id}', 'CompanyController@update')->name('company.update');
        Route::get('/delete/{id}', 'CompanyController@delete')->name('company.delete');
        Route::get('/changeStatus', 'CompanyController@changeStatus');
        Route::get('/filterStatus', 'CompanyController@filterStatus');
    });

    Route::prefix('client')->group(function () {
        Route::get('/create', 'ClientController@create')->name('client.create');
        Route::post('/save', 'ClientController@save')->name('client.save');
        Route::get('/list', 'ClientController@list')->name('client.list');
        Route::get('/view/{id}', 'ClientController@view')->name('client.view');
        Route::get('/edit/{id}', 'ClientController@edit')->name('client.edit');
        Route::post('/update/{id}', 'ClientController@update')->name('client.update');
        Route::get('/delete/{id}', 'ClientController@delete')->name('client.delete');
        Route::get('/changeStatus', 'ClientController@changeStatus');
        Route::get('/client-filter', 'ClientController@filterStatus');
    });

    Route::prefix('agent')->group(function () {
        Route::get('/create', 'AgentController@create')->name('agent.create');
        Route::post('/save', 'AgentController@save')->name('agent.save');
        Route::get('/list', 'AgentController@list')->name('agent.list');
        Route::get('/view/{id}', 'AgentController@view')->name('agent.view');
        Route::get('/edit/{id}', 'AgentController@edit')->name('agent.edit');
        Route::post('/update/{id}', 'AgentController@update')->name('agent.update');
        Route::get('/delete/{id}', 'AgentController@delete')->name('agent.delete');
        Route::get('/changeStatus', 'AgentController@changeStatus');
        Route::get('/filterStatus', 'AgentController@filterStatus');
    });

    Route::prefix('recruitment')->group(function () {
        Route::get('/create', 'Recruitmentcontroller@create')->name('recruitment.create');
        Route::post('/save', 'Recruitmentcontroller@save')->name('recruitment.save');
        Route::get('/list', 'Recruitmentcontroller@list')->name('recruitment.list');
        Route::get('/view/{id}', 'Recruitmentcontroller@view')->name('recruitment.view');
        Route::get('/edit/{id}', 'Recruitmentcontroller@edit')->name('recruitment.edit');
        Route::post('/update/{id}', 'Recruitmentcontroller@update')->name('recruitment.update');
        Route::get('/delete/{id}', 'Recruitmentcontroller@delete')->name('recruitment.delete');
        Route::get('/changeStatus', 'Recruitmentcontroller@changeStatus');
        Route::get('/recruitment-filter', 'Recruitmentcontroller@filterStatus');
    });
});
