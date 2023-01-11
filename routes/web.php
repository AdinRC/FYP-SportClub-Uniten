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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ni route untuk Admin
Route::middleware(['can:isAdmin'])->group(function(){
    // Ni adalah tempat untuk Admin manage Role User 
    // Kerana Role ade 3 iaitu Admin , user = student, editor = club


    // Admin Management
    Route::get('/AdminManage/admin', [App\Http\Controllers\AuthorizationController::class, 'index']);
    Route::get('/AdminManage/admin/create', [App\Http\Controllers\AuthorizationController::class, 'create']);
    Route::post('/AdminManage/admin/store', [App\Http\Controllers\AuthorizationController::class, 'store']);
    Route::get('/AdminManage/admin/{id}/edit', [App\Http\Controllers\AuthorizationController::class, 'edit']);
    Route::put('/AdminManage/admin/{id}', [App\Http\Controllers\AuthorizationController::class, 'update']);
    Route::delete('/AdminManage/admin/{id}', [App\Http\Controllers\AuthorizationController::class, 'destroy']);



    // Club Managament
    Route::get('/AdminManage/club', [App\Http\Controllers\RoleClubController::class, 'index']);
    Route::get('/AdminManage/club/create', [App\Http\Controllers\RoleClubController::class, 'create']);
    Route::post('/AdminManage/club/store', [App\Http\Controllers\RoleClubController::class, 'store']);
    Route::get('/AdminManage/club/{id}/edit', [App\Http\Controllers\RoleClubController::class, 'edit']);
    Route::put('/AdminManage/club/{id}', [App\Http\Controllers\RoleClubController::class, 'update']);
    Route::delete('/AdminManage/club/{id}', [App\Http\Controllers\RoleClubController::class, 'destroy']);


    
    // Editor Management 
    Route::get('/AdminManage/editor', [App\Http\Controllers\RoleEditorController::class, 'index']);
    Route::get('/AdminManage/editor/create', [App\Http\Controllers\RoleEditorController::class, 'create']);
    Route::post('/AdminManage/editor/store', [App\Http\Controllers\RoleEditorController::class, 'store']);
    Route::get('/AdminManage/editor/{id}/edit', [App\Http\Controllers\RoleEditorController::class, 'edit']);
    Route::put('/AdminManage/editor/{id}', [App\Http\Controllers\RoleEditorController::class, 'update']);
    Route::delete('/AdminManage/editor/{id}', [App\Http\Controllers\RoleEditorController::class, 'destroy']);


    // Student Management
    Route::get('/AdminManage/student', [App\Http\Controllers\RoleStudentController::class, 'index']);
    Route::get('/AdminManage/student/create', [App\Http\Controllers\RoleStudentController::class, 'create']);
    Route::post('/AdminManage/student/store', [App\Http\Controllers\RoleStudentController::class, 'store']);
    Route::get('/AdminManage/student/{id}/edit', [App\Http\Controllers\RoleStudentController::class, 'edit']);
    Route::put('/AdminManage/student/{id}', [App\Http\Controllers\RoleStudentController::class, 'update']);
    Route::delete('/AdminManage/student/{id}', [App\Http\Controllers\RoleStudentController::class, 'destroy']);

    //Ni untuk view all event
    Route::get('/AdminManage/event', [App\Http\Controllers\eventController::class, 'indexAdminEvent']);
    Route::delete('/AdminManage/event/{id}', [App\Http\Controllers\eventController::class, 'destroyAdmin']);
});


////////////////////////
//Ni route untuk Editor(Club)
Route::middleware(['can:isEditor'])->group(function(){
    Route::get('/EditorManage/event', [App\Http\Controllers\eventController::class, 'index']);
    Route::get('/EditorManage/event/index_Event/{id}', [App\Http\Controllers\eventController::class, 'index_Event']);
    Route::get('/EditorManage/event/create', [App\Http\Controllers\eventController::class, 'create']);
    Route::post('/EditorManage/event/store', [App\Http\Controllers\eventController::class, 'store']);
    Route::get('/EditorManage/event/{id}/edit', [App\Http\Controllers\eventController::class, 'edit']);
    Route::put('/EditorManage/event/{id}', [App\Http\Controllers\eventController::class, 'update']);
    Route::delete('/EditorManage/event/{id}', [App\Http\Controllers\eventController::class, 'destroy']);


    //////////////////////////////////////////////////////////////////////////////
    //Ni untuk membership editor for accept or reject students
    Route::get('/EditorManage/joinclub', [App\Http\Controllers\MembershipController::class, 'indexEditor']);
    Route::post('/EditorManage/joinclub/index/{id}/accept', [App\Http\Controllers\MembershipController::class, 'accept']);
    Route::post('/EditorManage/joinclub/index/{id}/reject', [App\Http\Controllers\MembershipController::class, 'reject']);

    //Ni untuk view all event
    Route::get('/EditorManage/event2', [App\Http\Controllers\eventController::class, 'indexEditorEvent']);

    //Ni untuk event editor for accept or reject students attendance
    Route::get('/EditorManage/attendance', [App\Http\Controllers\eventController::class, 'indexEditorJoinEvent']);
    Route::post('/EditorManage/attendance/index/{id}/accept', [App\Http\Controllers\eventController::class, 'accept']);
    Route::post('/EditorManage/attendance/index/{id}/reject', [App\Http\Controllers\eventController::class, 'reject']);

});


//////////////////////
// Ni route untuk User(Student)
Route::middleware(['can:isUser'])->group(function(){
    Route::get('/StudentManage/club', [App\Http\Controllers\ClubController::class, 'index']);
    Route::get('/StudentManage/club/index_Event/{id}', [App\Http\Controllers\ClubController::class, 'index_Event']);


    //////////////////////////////////////////////////////////////////////////////
    //Ni untuk membership student untuk join club
    Route::get('/StudentManage/joinclub', [App\Http\Controllers\MembershipController::class, 'index']);
    Route::post('/StudentManage/joinclub/store', [App\Http\Controllers\MembershipController::class, 'store']);


    //Ni untuk view all event dan join event
    Route::get('/StudentManage/event', [App\Http\Controllers\eventController::class, 'indexStudentEvent']);
    Route::post('/StudentManage/event/store', [App\Http\Controllers\eventController::class, 'indexStudentEventStore']);
});