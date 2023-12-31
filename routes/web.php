<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StoController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

//membuat crud ajax


//STO
Route::get('sto', [StoController::class, 'index'])->name('index_sto');


//create
Route::post('AddSto', [HomeController::class, 'AddSto'])->name('AddSto');
Route::get('GetDataSto',[HomeController::class, 'GetDataSto'])->name('GetDataSto');
Route::get('SearchDataSto/{itemcode}',[HomeController::class, 'SearchDataSto'])->name('SearcDataSto');
Route::get('Print_pdf/{id}',[HomeController::class, 'print_pdf'])->name('print_pdf');



Route::get('GetMasterItemCode',[HomeController::class, 'GetMasterItemCode'])->name('GetMasterItemCode');
Route::post('checkDatax', [HomeController::class, 'checkData'])->name('checkDatax');
Route::post('checkDataSto', [HomeController::class, 'checkData_sto'])->name('checkDataSto');
Route::get('sto_export/{data}', [HomeController::class, 'reportexcel'])->name('reportexcelNew');


// report
Route::get('report', [ReportController::class, 'index'])->name('report');
Route::post('checkData', [ReportController::class, 'checkData'])->name('checkData');

Route::get('sto/{data}', [ReportController::class, 'reportexcel'])->name('reportexcel');
Route::get('stoExcelAll/{data}', [ReportController::class, 'reportexcelall'])->name('reportexcelall');
