<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;

/*
|--------------------------------------------------------------------------
| Developer / Company Only Routes
|--------------------------------------------------------------------------
| Not registered in web.php. Access only with ?key=DEVELOPER_SECRET_KEY
| or X-Developer-Key header. Used to create admin from a proper form.
*/

Route::get('/create-admin', [DeveloperController::class, 'showCreateAdminForm'])->name('developer.create-admin.form');
Route::post('/create-admin', [DeveloperController::class, 'createAdmin'])->name('developer.create-admin.submit');
