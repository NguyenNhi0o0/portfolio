<?php

use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('showCase.index');
});


// Route::get('/dashboard', [AdminController::class, 'dashboard']);

// Route::post('/admin/login', [AdminController::class, 'login']);

// Route::middleware(['/admin'])->group(function () {

    
//     Route::get('/admin', function () {
//         return view('admin.index');
//     });
//     Route::post('/project', [ProjectController::class, 'store']);
//     Route::get('/project/create', [ProjectController::class, 'create']);
//     Route::get('/projects', [ProjectController::class, 'all']);
//     Route::get('/projects/{id}', [ProjectController::class, 'edit']);
//     Route::put('/projects/{id}', [ProjectController::class, 'update']);
//     Route::delete('/project/{id}', [ProjectController::class, 'delete']);
// });




// // Route::post('/project', [ProjectController::class, 'store']);
// // Route::get('/project/create', [ProjectController::class, 'create']);
// // Route::get('/projects', [ProjectController::class, 'all']);
// // Route::get('/projects/{id}', [ProjectController::class, 'edit']);
// // Route::put('/projects/{id}', [ProjectController::class, 'update']);
// // Route::delete('/project/{id}', [ProjectController::class, 'delete']);


// Route::post('/education', [EducationController::class, 'store']);
// Route::get('/education/create', [EducationController::class, 'create']);
// Route::get('/educations', [EducationController::class, 'all']);
// Route::get('/educations/{id}', [EducationController::class, 'edit']);
// Route::put('/educations/{id}', [EducationController::class, 'update']);
// Route::delete('/education/{id}', [EducationController::class, 'delete']);

// Route::post('/experience', [ExperienceController::class, 'store']);
// Route::get('/experience/create', [ExperienceController::class, 'create']);
// Route::get('/experiences', [ExperienceController::class, 'all']);
// Route::get('/experiences/{id}', [ExperienceController::class, 'edit']);
// Route::put('/experiences/{id}', [ExperienceController::class, 'update']);
// Route::delete('/experience/{id}', [ExperienceController::class, 'delete']);

// Route::get('/contents', [ContentController::class, 'all']);
// Route::get('/content/{id}', [ContentController::class, 'edit']);
// Route::put('/content/{id}', [ContentController::class, 'update']);

// Route::get('/images', [ImageController::class, 'all']);
// Route::put('/image/{category}', [ImageController::class, 'update']);

// Route::get('/contacts', [ContactController::class, 'all']);
// Route::post('/contact', [ContactController::class, 'store']);
// Route::delete('/contact/{id}', [ContactController::class, 'delete']);




Route::get('/about', function () {
    return view('showCase.about');
});

Route::get('/myproject', function () {
    return view('showCase.project');
});

Route::get('/contacts/create', [ContactController::class, 'create']);
Route::post('/contacts/create', [ContactController::class, 'store']);