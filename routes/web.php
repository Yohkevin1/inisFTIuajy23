<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KepanitiaanController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'Index'])->name('frontend.index');
Route::get('/struktur', [IndexController::class, 'Struktur'])->name('frontend.struktur');
Route::get('/panitia', [IndexController::class, 'Panitia'])->name('frontend.panitia');
Route::get('/filosofi', [IndexController::class, 'Filosofi'])->name('frontend.filosofi');
Route::get('/media', [IndexController::class, 'Media'])->name('frontend.media');
Route::get('/peserta', [IndexController::class, 'PesertaView'])->name('frontend.peserta');
Route::get('/tugas', [IndexController::class, 'TugasView'])->name('frontend.tugas');
Route::get('/atribut', [IndexController::class, 'AtributView'])->name('frontend.atribut');
Route::get('/download/tugas/{$id}', [IndexController::class, 'downloadFile'])->name('download.tugas');
Route::get('/panitia/view/modal/{id}', [IndexController::class, 'PanitiaView']);

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'Login'])->name('admin.login');
    Route::post('/store/login', [AdminController::class, 'StoreLogin'])->name('store.admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout');

    Route::get('/timeline', [AdminController::class, 'Timeline'])->name('admin.timeline')->middleware('acara');
    Route::post('/store/timeline', [AdminController::class, 'StoreTimeline'])->name('admin.timeline.store')->middleware('acara');
    Route::get('/edit/timeline/{id}', [AdminController::class, 'EditTimeline'])->name('admin.edit.timeline')->middleware('acara');
    Route::post('/update/timeline/{id}', [AdminController::class, 'UpdateTimeline'])->name('admin.timeline.update')->middleware('acara');
    Route::get('/delete/timeline/{id}', [AdminController::class, 'TimelineDelete'])->name('admin.delete.timeline')->middleware('acara');

    Route::get('/bidang', [KepanitiaanController::class, 'Bidang'])->name('admin.bidang')->middleware('admin');
    Route::post('/bidang/store', [KepanitiaanController::class, 'StoreBidang'])->name('admin.bidang.store')->middleware('admin');
    Route::get('/edit/bidang/{id}', [KepanitiaanController::class, 'EditBidang'])->name('admin.edit.bidang')->middleware('admin');
    Route::post('/bidang/update/{id}', [KepanitiaanController::class, 'UpdateBidang'])->name('admin.bidang.update')->middleware('admin');
    Route::get('/delete/bidang/{id}', [KepanitiaanController::class, 'DeleteBidang'])->name('admin.delete.bidang')->middleware('admin');


    // sub bidang
    Route::get('/sub_bidang', [KepanitiaanController::class, 'SubBidang'])->name('admin.sub_bidang')->middleware('admin');
    Route::post('/sub_bidang/store', [KepanitiaanController::class, 'StoreSubBidang'])->name('admin.sub_bidang.store')->middleware('admin');
    Route::get('/delete/sub_bidang/{id}', [KepanitiaanController::class, 'DeleteSubBidang'])->name('admin.delete.sub_bidang')->middleware('admin');

    // susunan kepanitiaan 
    Route::get('/panitia/kelola', [KepanitiaanController::class, 'KelolaPanitia'])->name('admin.panitia')->middleware('admin');
    Route::post('/list_panitia/store', [KepanitiaanController::class, 'StorePanitia'])->name('admin.list_panitia.store')->middleware('admin');
    Route::get('/panitia/hapus/{id}', [KepanitiaanController::class, 'PanitiaHapus'])->name('panitia.hapus')->middleware('admin');
    Route::get('/panitia/edit/{id}', [KepanitiaanController::class, 'PanitiaEdit'])->name('panitia.edit')->middleware('admin');
    Route::post('/panitia/update/{id}', [KepanitiaanController::class, 'PanitiaUpdate'])->name('panitia.update')->middleware('admin');

    // sosmed
    Route::post('/sosmed/store', [AdminController::class, 'StoreSosmed'])->name('admin.sosmed.store')->middleware('admin');
    Route::get('/delete/sosmed/{id}', [AdminController::class, 'DeleteSosmed'])->name('admin.delete.sosial_media')->middleware('admin');

    // List User
    Route::get('/account_user', [AdminController::class, 'UserPage'])->name('admin.account_user')->middleware('admin');
    Route::post('/account_user', [AdminController::class, 'AddUser'])->name('admin.account_user')->middleware('admin');
    Route::get('/account/delete/{id}', [AdminController::class, 'Delete'])->name('admin.delete')->middleware('admin');
    Route::get('/update/user/{id}', [AdminController::class, 'UpdateUserPage'])->name('admin.update.user.page')->middleware('admin');
    Route::post('/update/user/{id}', [AdminController::class, 'updateUser'])->name('admin.update.user')->middleware('admin');

    //Tugas
    Route::get('tugas', [UserController::class, 'tugas'])->name('admin.tugas')->middleware('tugas');
    Route::post('tugas', [UserController::class, 'saveTugas'])->name('admin.tugas')->middleware('tugas');
    Route::get('tugas/download/{id}', [UserController::class, 'exportFileTugas'])->name('admin.tugas.download');
    Route::get('tugas/delete/{id}', [UserController::class, 'tugasHapus'])->name('admin.tugas.delete')->middleware('tugas');
    Route::get('/edit/tugas/{id}', [UserController::class, 'editTugas'])->name('admin.edit.tugas')->middleware('tugas');
    Route::post('/tugas/update/{id}', [UserController::class, 'updateTugas'])->name('admin.tugas.update')->middleware('tugas');

    //atribut
    Route::get('atribut', [UserController::class, 'atribut'])->name('admin.atribut')->middleware('atribut');
    Route::post('atribut', [UserController::class, 'saveAtribut'])->name('admin.atribut')->middleware('atribut');
    Route::get('atribut/download/{id}', [UserController::class, 'exportFileAtribut'])->name('admin.atribut.download')->middleware('atribut');
    Route::get('atribut/delete/{id}', [UserController::class, 'hapusAtribut'])->name('admin.atribut.delete')->middleware('atribut');
    Route::get('/edit/atribut/{id}', [UserController::class, 'editAtribut'])->name('admin.edit.atribut')->middleware('atribut');
    Route::post('/atribut/update/{id}', [UserController::class, 'updateAtribut'])->name('admin.atribut.update')->middleware('atribut');

    Route::get('/account/{id}', [UserController::class, 'Account'])->name('admin.akun');
    Route::post('/account/{id}', [UserController::class, 'Update'])->name('user.update');
});

Route::controller(UserController::class)->middleware('user')->group(function () {
    Route::get('users', 'index')->name('admin.kelompok');
    Route::get('users-export', 'export')->name('users.export');
    Route::post('users-import', 'import')->name('users.import');
    Route::post('/update/mahasiswa/{id}', 'updateMahasiswa')->name('mahasiswa.update');
    Route::get('/delete/mahasiswa/{id}', 'deleteMahasiswa')->name('mahasiswa.delete');
    Route::get('/delete/all/mahasiswa/', 'deleteAllMahasiswa')->name('mahasiswa.delete.all');
});
