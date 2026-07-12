<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdmindashboardsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\ChainOfCustodiesController;
use App\Http\Controllers\EvidenceFilesController;
use App\Http\Controllers\EvidencesController;
use App\Http\Controllers\EvidenceTypesController;
use App\Http\Controllers\AuditLogsController;
use App\Http\Controllers\AIChatController;
use Prism\Prism\Facades\Prism;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','role:admin'])->group(function () {

    Route::get('/admindashboards-index',
        [AdminDashboardsController::class,'index'])
        ->name('admindashboards-index');

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//.  Giving right each user to access  //
//admin
Route::middleware(['auth','role:Admin'])->group(function () {
    Route::get('/users-index',
        [UsersController::class,'index']);
});
//admin+ investigator
Route::middleware(['auth','role:Admin,Investigator'])
    ->group(function () {

    Route::get('/cases-index',
        [CasesController::class,'index']);

});
//officer
Route::middleware([
    'auth',
    'role:Admin,Officer'
])->group(function () {

    Route::post('/evidencefiles-store',
        [EvidenceFilesController::class,'store']);

});
//auditor
Route::middleware([
    'auth',
    'role:Admin,Auditor'
])->group(function () {

    Route::get('/auditlogs-index',
        [AuditLogsController::class,'index']);

});


/* User Route */
Route::get('/users-index',[UsersController::class,'index'])->name('users-index');
Route::get('/users-create',[UsersController::class,'create'])->name('users-create');
Route::post('/users-store',[UsersController::class,'store'])->name('users-store');
Route::get('/users-edit/{id}',[UsersController::class,'edit'])->name('users-edit');
Route::post('/users-update',[UsersController::class,'update'])->name('users-update');
Route::get('/users-delete/{id}',[UsersController::class,'delete'])->name('users-delete');

/* Cases Route */
Route::get('/cases-index',[CasesController::class,'index'])->name('cases-index');
Route::get('/cases-create',[CasesController::class,'create'])->name('cases-create');
Route::post('/cases-store',[CasesController::class,'store'])->name('cases-store');
Route::get('/cases-edit/{id}',[CasesController::class,'edit'])->name('cases-edit');
Route::post('/cases-update',[CasesController::class,'update'])->name('cases-update');
Route::get('/cases-delete/{id}',[CasesController::class,'delete'])->name('cases-delete');

/* ChainOfCustodies Route */
Route::get('/chainofcustodies-index',[ChainOfCustodiesController::class,'index'])->name('chainofcustodies-index');
Route::get('/chainofcustodies-create',[ChainOfCustodiesController::class,'create'])->name('chainofcustodies-create');
Route::post('/chainofcustodies-store',[ChainOfCustodiesController::class,'store'])->name('chainofcustodies-store');
Route::get('/chainofcustodies-edit/{id}',[ChainOfCustodiesController::class,'edit'])->name('chainofcustodies-edit');
Route::post('/cchainofcustodies-update',[ChainOfCustodiesController::class,'update'])->name('chainofcustodies-update');
Route::get('/chainofcustodies-delete/{id}',[ChainOfCustodiesController::class,'delete'])->name('chainofcustodies-delete');

/* EvidenceFiles Route */
Route::get('/evidencefiles-index',[EvidenceFilesController::class,'index'])->name('evidencefiles-index');
Route::get('/evidencefiles-create',[EvidenceFilesController::class,'create'])->name('evidencefiles-create');
Route::post('/evidencefiles-store',[EvidenceFilesController::class,'store'])->name('evidencefiles-store');
Route::get('/evidencefiles-edit/{id}',[EvidenceFilesController::class,'edit'])->name('evidencefiles-edit');
Route::post('/evidencefiles-update',[EvidenceFilesController::class,'update'])->name('evidencefiles-update');
Route::get('/evidencefiles-delete/{id}',[EvidenceFilesController::class,'delete'])->name('evidencefiles-delete');

/* Evidences Route */
Route::get('/evidences-index',[EvidencesController::class,'index'])->name('evidences-index');
Route::get('/evidences-create',[EvidencesController::class,'create'])->name('evidences-create');
Route::post('/evidences-store',[EvidencesController::class,'store'])->name('evidences-store');
Route::get('/evidences-edit/{id}',[EvidencesController::class,'edit'])->name('evidences-edit');
Route::post('/evidences-update',[EvidencesController::class,'update'])->name('evidences-update');
Route::get('/evidences-delete/{id}',[EvidencesController::class,'delete'])->name('evidences-delete');

/* EvidenceTypes Route */
Route::get('/evidencetypes-index',[EvidenceTypesController::class,'index'])->name('evidencetypes-index');
Route::get('/evidencetypes-create',[EvidenceTypesController::class,'create'])->name('evidencetypes-create');
Route::post('/evidencetypes-store',[EvidenceTypesController::class,'store'])->name('evidencetypes-store');
Route::get('/evidencetypes-edit/{id}',[EvidenceTypesController::class,'edit'])->name('evidencetypes-edit');
Route::post('/evidencetypes-update',[EvidenceTypesController::class,'update'])->name('evidencetypes-update');
Route::get('/evidencetypes-delete/{id}',[EvidenceTypesController::class,'delete'])->name('evidencetypes-delete');

/* AuditLogs Route */
Route::get('/auditlogs-index',[AuditLogsController::class,'index'])->name('auditlogs-index');
Route::post('/auditlogs-store',[AuditLogsController::class,'store'])->name('auditlogs-store');

/* AdminDashboards Route */
Route::get('/admindashboards-index',[AdminDashboardsController::class,'index'])->name('admindashboards-index');


// AI Assistant Routes

Route::get('/investigator-chat', function () {
    return view('aichat.chat');
})->name('aichat-chat');

Route::post(
    '/ask-evidence',
    [AIChatController::class,'askEvidence']
);

Route::get(
    '/test-entity',
    [AIChatController::class,'entityTest']
);

Route::get(
    '/timeline-test',
    [AIChatController::class,'timelineTest']
);