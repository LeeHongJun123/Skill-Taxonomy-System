<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\EroleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HrsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CareerHistoryController;
use App\Http\Controllers\PDFController;

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
//Index- Route to login 
Route::get('/', function () { return view('welcome');})->name('welcome');

//HRs Creating User 
Route::get('/HRregister',[AuthController::class,'register'])->name('acc.register');
Route::post('/HRregister',[AuthController::class, 'store'])->name('acc.store');

//Login
Route::get('/login',[AuthController::class,'login'])->name('acc.login');
Route::post('/login',[AuthController::class,'loginPost'])->name('acc.login');

Route::get('/password/change', [AuthController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/password/change', [AuthController::class, 'changePassword'])->name('password.update');

//Logout
Route::delete('logout',[AuthController::class,'logout'])->name('acc.logout');

//Searching Function 
Route::get('/manager/search', [EroleController::class, 'search'])->name('manager.search');
Route::get('/hr/search', [EroleController::class, 'HRsearch'])->name('HR.search');

//Convertin PDF 
Route::get('profile/pdf/{id}', [ProfileController::class, 'generatePDF'])->name('profile.pdf');
Route::get('/career-history/pdf/{id}', [CareerHistoryController::class, 'generatePdf'])->name('career-history.pdf');
Route::get('/hr/profile/pdf/{id}', [ProfileController::class, 'generatePDF'])->name('hr_profile.pdf');
Route::get('/hr/career-history/pdf/{id}', [CareerHistoryController::class, 'generatePdf'])->name('hr_career-history.pdf');


//Home - Manager 
Route::get('/Manager',function(){ return view('home');})->name('home');
Route::get('/view/Employee',[ProfileController::class, 'viewEmp'])->name('view.profile');
Route::get('/manager/employees/{id}/profile', [ProfileController::class, 'showEmployeeProfile'])->name('manager.employees.profile');
Route::get('/manager/employees/{id}/career-history', [CareerHistoryController::class, 'showUserCareerHistory'])->name('manager.users.career-history');


//Home - Hr Staff 
Route::get('/Hr',[HrsController::class, 'index'])->name('hr.home');
Route::get('/Hr/view/Employee',[HrsController::class, 'viewEmp'])->name('Hrview.profile');
Route::get('/Hr/employees/{id}/profile', [HrsController::class, 'showEmployeeProfile'])->name('hr.employees.profile');
Route::get('/Hr/employees/{id}/career-history', [HrsController::class, 'showUserCareerHistory'])->name('Hr.users.career-history');
Route::get('/Hr/view_taxonomy',[HrsController::class,'view_tax'])->name('Hr.viewtaxonomy');
Route::put('/profile/{id}/update-status', [HrsController::class, 'updateStatus'])->name('profile.updateStatus');
Route::delete('/user/{user}', [AuthController::class, 'destroy'])->name('user.destroy');




// Skill Controller
Route::get('/skill',[SkillController::class, 'index'])->name('skill.index');
Route::get('/skill/create',[SkillController::class, 'create'])->name('skill.create');
Route::post('/skill',[SkillController::class, 'store'])->name('skill.store');
Route::get('/skill/{skill}/edit',[SkillController::class, 'edit'])->name('skill.edit');
Route::put('/skill/{skill}/update',[SkillController::class, 'update'])->name('skill.update');
Route::delete('/skill/{skill}/delete',[SkillController::class, 'delete'])->name('skill.delete');

// Tool Controller
Route::get('/tool',[ToolController::class, 'index'])->name('tool.index');
Route::get('/tool/create',[ToolController::class, 'create'])->name('tool.create');
Route::post('/tool',[ToolController::class, 'store'])->name('tool.store');
Route::get('/tool/{tool}/edit',[ToolController::class, 'edit'])->name('tool.edit');
Route::put('/tool/{tool}/update',[ToolController::class, 'update'])->name('tool.update');
Route::delete('/tool/{tool}/delete',[ToolController::class, 'delete'])->name('tool.delete');

//Roles Controller 
Route::get('/role',[RoleController::class, 'index'])->name('role.index');
Route::get('/role/create',[RoleController::class, 'create'])->name('role.create');
Route::post('/role',[RoleController::class, 'store'])->name('role.store');
Route::get('/role/{role}/edit',[RoleController::class, 'edit'])->name('role.edit');
Route::put('/role/{role}/update',[RoleController::class, 'update'])->name('role.update');
Route::delete('/role/{role}/delete',[RoleController::class, 'delete'])->name('role.delete');

// Erole [ Employee ]
Route::get('/erole',[EroleController::class, 'index'])->name('erole.index');
Route::get('/erole/skill',[EroleController::class, 'skill'])->name('erole.skill');
Route::get('/erole/tool',[EroleController::class, 'tool'])->name('erole.tool');
Route::get('erole/view_taxonomy',[EroleController::class,'view_tax'])->name('erole.viewtaxonomy');

//career history 
Route::get('/history',[CareerHistoryController::class, 'index'])->name('history.index');
Route::get('/history/create',[CareerHistoryController::class, 'create'])->name('history.create');
Route::post('/history', [CareerHistoryController::class, 'store'])->name('career_histories.store');
Route::get('/history/{history}/edit', [CareerHistoryController::class, 'edit'])->name('career_histories.edit');
Route::put('/history/{history}', [CareerHistoryController::class, 'update'])->name('career_histories.update');
Route::delete('/history/{history}/delete', [CareerHistoryController::class, 'delete'])->name('history.delete');


// [Employee profile ]
Route::get('/profile',[ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile/{profile}/update', [ProfileController::class, 'update'])->name('profile.update'); 




