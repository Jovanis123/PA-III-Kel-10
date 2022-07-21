<?php

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

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('auth.login');
});


/*
 * Route For Authentication
 *
 */
Auth::routes(['register' => false]);


/*
 * Routes For Home each Role
 *
 */
Route::get('/Okemin', 'AdminController@index')->middleware('role:Admin');

Route::get('/Teacher', 'TeacherController@index')->middleware('role:Teacher');

Route::get('/Student', 'StudentController@index')->middleware('role:Student');


/*
 * Routes For Profile Picture
 *
 */
Route::get('/Okemin/Profile/Picture', 'AdminController@profilePicture')->middleware('role:Admin');
Route::post('/Okemin/Profile/Picture', 'AdminController@updateAvatar')->middleware('role:Admin');

Route::get('/Teacher/Profile/Picture', 'TeacherController@profilePicture')->middleware('role:Teacher');
Route::post('/Teacher/Profile/Picture', 'TeacherController@updateAvatar')->middleware('role:Teacher');

Route::get('/Student/Profile/Picture', 'StudentController@profilePicture')->middleware('role:Student');
Route::post('/Student/Profile/Picture', 'StudentController@updateAvatar')->middleware('role:Student');


/*
 * Routes For Profile
 *
 */
Route::get('/Okemin/Profile', 'AdminController@showProfile')->middleware('role:Admin');
Route::put('/Okemin/Profile/{id}', 'AdminController@editProfile')->middleware('role:Admin');
Route::post('/Okemin/Profile/changePassword/{id}', 'AdminController@editPassword')->name('okemin.profile.change.password')->middleware('role:Admin');

Route::get('/Teacher/Profile', 'TeacherController@showProfile')->middleware('role:Teacher');
Route::put('/Teacher/Profile/{id}', 'TeacherController@editProfile')->middleware('role:Teacher');
Route::post('/Teacher/Profile/changePassword/{id}', 'TeacherController@editPassword')->name('teacher.profile.change.password')->middleware('role:Teacher');

Route::get('/Student/Profile', 'StudentController@showProfile')->middleware('role:Student');
Route::put('/Student/Profile/{id}', 'StudentController@editProfile')->middleware('role:Student');
Route::post('/Student/Profile/changePassword/{id}', 'StudentController@editPassword')->name('student.profile.change.password')->middleware('role:Student');



/*
 * Routes For Kelas
 *
 */
// Create Kelas - Admin
Route::get('/Okemin/Kelas/Create', 'AdminController@showCreateKelas')->middleware('role:Admin');
Route::post('/Okemin/Kelas/Create/Send', 'AdminController@createKelas')->middleware('role:Admin');
// Show List Kelas - Admin
Route::get('/Okemin/Kelas/List', 'AdminController@showKelasList')->middleware('role:Admin');
// Search Kelas - Admin
Route::get('/Okemin/Kelas/List/Search', 'AdminController@searchKelas')->middleware('role:Admin');
// Edit Kelas - Okemin
Route::get('/Okemin/Kelas/Edit/{id}', 'AdminController@editKelas')->middleware('role:Admin');
Route::put('/Okemin/Kelas/Update/{id}', 'AdminController@updateKelas')->middleware('role:Admin');
// Delete Kelas - Okemin
Route::get('/Okemin/Kelas/Delete/{id}', 'AdminController@deleteKelas')->middleware('role:Admin');



/*
 * Routes For Mapel
 *
 */
// Create Mapel - Admin
Route::get('/Okemin/Mapel/Create', 'AdminController@showCreateMapel')->middleware('role:Admin');
Route::post('/Okemin/Mapel/Create/Send', 'AdminController@createMapel')->middleware('role:Admin');
// Show List Mapel - Admin
Route::get('/Okemin/Mapel/List', 'AdminController@showMapelList')->middleware('role:Admin');
// Search Mapel - Admin
Route::get('/Okemin/Mapel/List/Search', 'AdminController@searchMapel')->middleware('role:Admin');
// Edit Mapel - Okemin
Route::get('/Okemin/Mapel/Edit/{id}', 'AdminController@editMapel')->middleware('role:Admin');
Route::put('/Okemin/Mapel/Update/{id}', 'AdminController@updateMapel')->middleware('role:Admin');
// Delete Mapel - Okemin
Route::get('/Okemin/Mapel/Delete/{id}', 'AdminController@deleteMapel')->middleware('role:Admin');



/**
 * Routes For Materi
 * TEACHER
 *
 */
// Create Materi - Teacher
Route::get('/Teacher/Materi/Create', 'TeacherController@showCreateMateri')->middleware('role:Teacher');
Route::post('/Teacher/Materi/Create/Send', 'TeacherController@createMateri')->middleware('role:Teacher');
// Show List Materi - Teacher
Route::get('/Teacher/Materi/List', 'TeacherController@showMateriList')->middleware('role:Teacher');
// Search Materi -Teacher
Route::get('/Teacher/Materi/List/Search', 'TeacherController@searchMateri')->middleware('role:Teacher');
// Edit Materi - Teacher
Route::get('/Teacher/Materi/Edit/{id}', 'TeacherController@editMateri')->middleware('role:Teacher');
Route::put('/Teacher/Materi/Update/{id}', 'TeacherController@updateMateri')->middleware('role:Teacher');
// Delete Materi - Teacher
Route::get('/Teacher/Materi/Delete/{id}', 'TeacherController@deleteMateri')->middleware('role:Teacher');

Route::middleware(['role:Teacher'])->group(function () {
    Route::get('/teacher/tugas/create', [TeacherController::class, 'showCreateTugas'])->name('teacher.create.tugas');
    Route::post('/teacher/tugas/save', [TeacherController::class, 'storeTugas'])->name('teacher.save.tugas');
    Route::get('/teacher/tugas/list', [TeacherController::class, 'showTugasList'])->name('teacher.list.tugas');
    Route::get('/teacher/tugas/list/search', [TeacherController::class, 'searchTugas'])->name('teacher.search.tugas');
    Route::get('/teacher/tugas/edit/{id}', [TeacherController::class, 'showEditTugas'])->name('teacher.edit.tugas');
    Route::put('/teacher/tugas/update/{id}', [TeacherController::class, 'updateTugas'])->name('teacher.update.tugas');
    Route::get('/teacher/tugas/delete/{id}', [TeacherController::class, 'deleteTugas'])->name('teacher.delete.tugas');
});

/**
 * Route For Materi
 * STUDENT
 *
 */
Route::get('/Student/Materi/Mapel', 'StudentController@showMapel')->middleware('role:Student');
Route::get('/Student/Materi/List/{id}', 'StudentController@showMateriList')->middleware('role:Student');
Route::get('/Student/Materi/singleMateri/{id}', 'StudentController@showSingleMateri')->middleware('role:Student');
Route::get('/Student/Materi/singleMateri/exportPdf/{id}', 'StudentController@exportPdf')->middleware('role:Student');

Route::get('/student/tugas/mapel', [StudentController::class, 'showMapelTugas'])->middleware('role:Student')->name('student.tugas.mapel');
Route::get('/student/tugas/mapel/list/{id}', [StudentController::class, 'showTugasList'])->middleware('role:Student')->name('student.tugas.mapel.list');
Route::get('/student/tugas/mapel/list/tugas/{id}', [StudentController::class, 'showSingleTugas'])->middleware('role:Student')->name('student.tugas.mapel.list.single');
Route::get('/student/tugas/mapel/list/tugas/download/{id}', [StudentController::class, 'downloadTugas'])->middleware('role:Student')->name('student.tugas.mapel.list.tugas.download');

/*
/**
 * Routes For Exercise & Question
 * TEACHER
 *
 */
// Create Exercise - Teacher
//Route::get('/Teacher/Exercise/Create', 'TeacherController@showCreateExercise')->middleware('role:Teacher');
//Route::post('/Teacher/Exercise/Create/Send', 'TeacherController@createExercise')->middleware('role:Teacher');
// Show Exercise List - Teacher
//Route::get('/Teacher/Exercise/List/', 'TeacherController@showExerciseList')->middleware('role:Teacher');
// Search Exercise -Teacher
//Route::get('/Teacher/Exercise/List/Search', 'TeacherController@searchExercise')->middleware('role:Teacher');
// Edit Materi - Teacher
//Route::get('/Teacher/Exercise/Edit/{id}', 'TeacherController@editExercise')->middleware('role:Teacher');
//Route::put('/Teacher/Exercise/Update/{id}', 'TeacherController@updateExercise')->middleware('role:Teacher');
// Delete Exercise - Teacher
//Route::get('/Teacher/Exercise/Delete/{id}', 'TeacherController@deleteExercise')->middleware('role:Teacher');
// Search Exercise -Teacher
//Route::get('/Teacher/Exercise/Question/{id}', 'TeacherController@showEditQuestion')->middleware('role:Teacher');
// Create Question - Teacher
//Route::post('/Teacher/Exercise/Question/Create/Send', 'TeacherController@createQuestion')->middleware('role:Teacher');

/**
 * User Manager
 *
 */
// TEACHER
// Show List
Route::get('/Okemin/User/Teacher/List', 'AdminController@showTeacherList')->middleware('role:Admin');
// Show Search Result
Route::get('/Okemin/User/Teacher/List/Search', 'AdminController@searchTeacher')->middleware('role:Admin');
// Delete Teacher
Route::get('/Okemin/User/Teacher/Delete/{id}', 'AdminController@deleteTeacher')->middleware('role:Admin');

// MANAGE PROFILE OF TEACHER USER
// Photo Profile
Route::get('/Okemin/User/Teacher/Profile/Picture/{id}', 'AdminController@profilePictureTeacher')->middleware('role:Admin');
Route::post('/Okemin/User/Teacher/Profile/Picture/Send/{id}', 'AdminController@updateAvatarTeacher')->middleware('role:Admin');
// Profile Details
Route::get('/Okemin/User/Teacher/Profile/{id}', 'AdminController@showProfileTeacher')->middleware('role:Admin');
Route::put('/Okemin/User/Teacher/Profile/Send/{id}', 'AdminController@editProfileTeacher')->middleware('role:Admin');
Route::post('/Okemin/User/Teacher/Profile/changePassword/{id}', 'AdminController@editPasswordTeacher')->middleware('role:Admin');
// Create Teacher
Route::get('/Okemin/User/Teacher/Create', 'AdminController@showCreateTeacher')->middleware('role:Admin');
Route::post('/Okemin/User/Teacher/Create/Send', 'AdminController@createTeacher')->middleware('role:Admin');

// STUDENT
// Show List
Route::get('/Okemin/User/Student/List', 'AdminController@showStudentList')->middleware('role:Admin');
// Show Search Result
Route::get('/Okemin/User/Student/List/Search', 'AdminController@searchStudent')->middleware('role:Admin');
// Delete Student
Route::get('/Okemin/User/Student/Delete/{id}', 'AdminController@deleteStudent')->middleware('role:Admin');
// Photo Profile
Route::get('/Okemin/User/Student/Profile/Picture/{id}', 'AdminController@profilePictureStudent')->middleware('role:Admin');
Route::post('/Okemin/User/Student/Profile/Picture/Send/{id}', 'AdminController@updateAvatarStudent')->middleware('role:Admin');
// Profile Details
Route::get('/Okemin/User/Student/Profile/{id}', 'AdminController@showProfileStudent')->middleware('role:Admin');
Route::put('/Okemin/User/Student/Profile/Send/{id}', 'AdminController@editProfileStudent')->middleware('role:Admin');
Route::post('/Okemin/User/Student/Profile/changePassword/{id}', 'AdminController@editPasswordStudent')->middleware('role:Admin');
// Create Student
Route::get('/Okemin/User/Student/Create', 'AdminController@showCreateStudent')->middleware('role:Admin');
Route::post('/Okemin/User/Student/Create/Send', 'AdminController@createStudent')->middleware('role:Admin');


Route::get('/Okemin/Pengumuman/', 'PengumumanController@show')->middleware('role:Admin')->name('admin_pengumuman');
Route::get('/Okemin/Pengumuman/detail/{id}', 'PengumumanController@showById')->middleware('role:Admin')->name('admin_pengumuman_detail');
Route::post('/Okemin/Pengumuman/store', 'PengumumanController@store')->middleware('role:Admin');
Route::get('/Okemin/Pengumuman/edit/{id}', 'PengumumanController@edit')->middleware('role:Admin');
Route::patch('/Okemin/Pengumuman/update/', 'PengumumanController@update')->middleware('role:Admin');
Route::get('/Okemin/Pengumuman/destroy/{id}', 'PengumumanController@destroy')->middleware('role:Admin');

Route::middleware(['role:Teacher'])->group(function () {
    Route::get('/Teacher/Pengumuman', 'PengumumanController@showToTeacher')->name('teacher.show.pengumuman');
    Route::get('/Teacher/Pengumuman/detail/{id}', 'PengumumanController@showById')->name('teacher.show.pengumuman.detail');
});

// QUIZ TEACHER
Route::get('/Teacher/Quiz/', 'QuizController@show')->middleware('role:Teacher');
Route::get('/Teacher/Quiz/{id}', 'SoalController@showById')->middleware('role:Teacher');
Route::post('/Teacher/Quiz/store', 'QuizController@store')->middleware('role:Teacher');
Route::post('/Teacher/Quiz/edit/{id}', 'QuizController@edit')->middleware('role:Teacher');
Route::patch('/Teacher/Quiz/update', 'QuizController@update')->middleware('role:Teacher');
Route::get('/Teacher/Quiz/destroy/{id}', 'QuizController@destroy')->middleware('role:Teacher');

Route::post('/Teacher/Quiz/soal/store', 'SoalController@store')->middleware('role:Teacher');
Route::get('/Teacher/Quiz/soal/edit/{id}', 'SoalController@edit')->middleware('role:Teacher');
Route::patch('/Teacher/Quiz/soal/update', 'SoalController@update')->middleware('role:Teacher');
Route::get('/Teacher/Quiz/soal/destroy/{id}', 'SoalController@destroy')->middleware('role:Teacher');

// QUIZ STUDENT
Route::get('/Student/Quiz/', 'QuizController@showByStudent')->middleware('role:Student');
Route::get('/Student/Quiz/soal/{id}', 'SoalController@showDetailByStudent')->middleware('role:Student');
Route::post('/Student/Quiz/store', 'SoalController@storeStudentQuiz')->middleware('role:Student');


Route::get('/Teacher/Pengumuman/', 'PengumumanController@show')->middleware('role:Teacher');

Route::get('/Student/Pengumuman', 'PengumumanController@show')->middleware('role:Student')->name('pengumuman_pengumuman');
Route::get('/Student/Pengumuman/detail/{id}', 'PengumumanController@showById')->middleware('role:Student')->name('pengumuman_pengumuman_detail');
Route::post('/Student/Pengumuman/store', 'PengumumanController@store')->middleware('role:Student');
Route::get('/Student/Pengumuman/edit/{id}', 'PengumumanController@edit')->middleware('role:Student');
Route::patch('/Student/Pengumuman/update/', 'PengumumanController@update')->middleware('role:Student');
Route::get('/Student/Pengumuman/destroy/{id}', 'PengumumanController@destroy')->middleware('role:Student');
/*
 * This Routes Below is For Testing Routes
 *
 */
//Route::get('/contoh', function () {
//    return view('pages.pageContoh');
//});

//Route::get('/home', 'HomeController@index')->name('home');
