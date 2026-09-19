<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'home');

use App\Http\Controllers\AdminController;
Route::view('/admin/login','admin.login');
Route::post('/admin/login',[AdminController::class, 'login']);
Route::get('/logout',[AdminController::class, 'logout']);


use App\Http\Controllers\DashboardController;
Route::get('/admin/dashboard',[DashboardController::class, 'index']);



use App\Http\Controllers\FlightController;
Route::get('/admin/flights',[FlightController::class, 'index']);
Route::get('admin/add-flight', [FlightController::class, 'create']);
Route::post('admin/add-flight', [FlightController::class, 'store']);
Route::get('/edit-flight/{id}',[FlightController::class, 'edit']);
Route::post('admin/update-flight/{id}',[FlightController::class, 'update']);
Route::get('/delete-flight/{id}',[FlightController::class, 'delete']);


use App\Http\Controllers\PassengerController;
Route::get('/admin/passengers', [PassengerController::class, 'index']);
Route::get('/admin/add-passenger', [PassengerController::class, 'create']);
Route::post('/admin/add-passenger', [PassengerController::class, 'store']);

Route::get('/edit-passenger/{id}', [PassengerController::class, 'edit']);
Route::post('admin/update-passenger/{id}', [PassengerController::class, 'update']);
Route::get('/delete-passenger/{id}', [PassengerController::class, 'delete']);


use App\Http\Controllers\StaffController;

Route::get('/admin/staff', [StaffController::class, 'index']);
Route::get('/admin/add-staff', [StaffController::class, 'create']);
Route::post('/admin/staff/store', [StaffController::class, 'store']);
Route::get('/admin/edit-staff/{id}', [StaffController::class, 'edit']);
Route::post('/admin/update-staff/{id}', [StaffController::class, 'update']);
Route::get('/admin/delete-staff/{id}', [StaffController::class, 'delete']);


use App\Http\Controllers\ScheduleController;
Route::get('/admin/schedules', [App\Http\Controllers\ScheduleController::class, 'index']);
Route::get('/admin/add-schedule', [App\Http\Controllers\ScheduleController::class, 'create']);
Route::post('/admin/store-schedule', [App\Http\Controllers\ScheduleController::class, 'store']);
Route::get('/admin/edit-schedule/{id}', [ScheduleController::class, 'edit']);
Route::post('/admin/update-schedule/{id}', [ScheduleController::class, 'update']);
Route::get('/admin/delete-schedule/{id}', [ScheduleController::class, 'destroy']);


Route::view('/admin/add-flight', 'admin.add-flight');

use App\Http\Controllers\ReportController;

Route::get('/admin/reports', [ReportController::class, 'index']);
Route::post('/admin/generate-report', [ReportController::class, 'generate'])->name('admin.reports.generate');
Route::get('/admin/download-pdf', [ReportController::class, 'downloadPdf'])->name('admin.reports.download');

Route::get('/logout', function () {

session()->flush();

return redirect('/');

});

use App\Http\Controllers\PassengerAuthController;

Route::get('/passenger/login', [App\Http\Controllers\PassengerAuthController::class, 'showLoginForm'])->name('passenger.login');
Route::post('/passenger/login', [App\Http\Controllers\PassengerAuthController::class, 'login']);







Route::get('/passenger/flight-schedule', [App\Http\Controllers\PassengerAuthController::class, 'schedule'])->name('passenger.flight-schedule');


Route::get('/passenger/dashboard', [App\Http\Controllers\PassengerAuthController::class, 'dashboard'])->name('passenger.dashboard');
Route::get('/passenger/profile', [App\Http\Controllers\PassengerAuthController::class, 'profile'])->name('passenger.profile');

Route::get('/passenger/flight-finder', [PassengerAuthController::class, 'showFinder'])->name('passenger.flight-finder');
Route::get('/passenger/flight-finder/search', [PassengerAuthController::class, 'findFlights'])->name('passenger.flight-finder.search');

Route::get('/passenger/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('passenger.profile.edit');
Route::post('/passenger/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('passenger.profile.update');

 Route::get('/passenger/notifications', [App\Http\Controllers\PassengerAuthController::class, 'notifications'])->name('passenger.notifications');

Route::get('/passenger/help', [App\Http\Controllers\PassengerAuthController::class, 'showHelp'])->name('passenger.help');
Route::post('/passenger/help/submit', [App\Http\Controllers\PassengerAuthController::class, 'submitHelp'])->name('passenger.help.submit');

use App\Http\Controllers\SupportController;
Route::get('/admin/supports', [SupportController::class, 'viewSupports'])->name('admin.supports');
Route::post('/admin/support/reply/{id}', [SupportController::class, 'adminReply'])->name('admin.support.reply');