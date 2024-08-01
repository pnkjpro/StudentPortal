<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Dompdf\Dompdf;

use App\Http\Controllers\CandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AwarenessController;
use Auth;

Route::view('/codeview','codeview');

//================ CRUD Candidate =====================
Route::group(['prefix'=> 'candidate', 'middleware' => ['auth']], function () {
Route::view('/create','d-panel.createCand')->name('create.candidate');
Route::POST('/create',[CandController::class,'create'])->name('createCandidate');

Route::get('/view', [CandController::class, 'viewCandidate'])->name('view.candidate');
Route::get('/session/2', [CandController::class, 'candSession'])->name('candSession');
Route::get('/session/month', [CandController::class, 'monthlyCands'])->name('monthlyCands');

Route::GET('/edit', [CandController::class,'editCandidate'])->name('editCandidate');
Route::POST('/update', [CandController::class, 'updateCand'])->name('updateCand');

Route::POST('/archive', [CandController::class, 'archive'])->name('candArchive');
Route::POST('/candidate/delete', [CandController::class, 'destroy'])->name('candDelete');

Route::GET('/update/status', [CandController::class, 'updateStatus'])->name('updateStatus');
});
//====================== Awareness Form =====================================================
Route::view('/awareness/create', 'd-panel.createAwareness')->name('create.awareness');
Route::POST('/awareness/store', [AwarenessController::class,'store'])->name('store.awareness');
Route::view('/awareness/view', 'd-panel.viewAwareness')->name('view.awareness');
Route::Post('/awarenss/followed', [AwarenessController::class,'followed'])->name('follow.awareness');
Route::Post('/awarenss/delete', [AwarenessController::class,'delete'])->name('delete.awareness');

//================Issue Certificate =======================
Route::GET('/candidate/issue',[CandController::class, 'createCertificate'])->name('issue.candidate');
Route::POST('/candidate/issue',[CandController::class,'issue'])->name('issueCert');

//================Certificate Verification =================
Route::POST('/verifyCert',[CandController::class,'verifyCert'])->name('verifyCert');

//================= Fee Portal ===============================
Route::group(['prefix' => 'fee', 'middleware' => ['auth']], function () {
// Route::view('/fee/create', 'd-panel.feeRecord')->name('createFeeRecord');
Route::GET('/create', [CandController::class, 'createFeeRecord'])->name('createFeeRecord');
Route::POST('/create', [CandController::class, 'feePayment'])->name('feePayment');

Route::view('/view', 'viewFeeForm')->name('viewFeeForm');
Route::POST('/verify', [CandController::class, 'verifyFee'])->name('verifyFee');
});
//=================================================================================

// Route::view('/signupAdmin', 'signupAdmin');
// Route::POST('/signupAdmin', [AdminController::class, 'createAdmin'])->name('signupAdmin');

Route::view('/login', 'loginAdmin')->name('login');
Route::POST('/loginAdmin', [AdminController::class,'AuthAdmin'])->name('loginAdmin');

Route::GET('/logout', function () {
    if(session()->has('user_id')) {
        session()->remove('user_id');
    }
    return redirect()->route('login');
})->name('logout');


Route::POST('/dashboard/fee/split', [CandController::class, 'feeSplit'])->name('feeSplit');

Route::view('/view/defaulters', 'd-panel.defaulterList')->name('defaulters.list');

























