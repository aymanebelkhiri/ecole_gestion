<?php

use App\Http\Controllers\Absence;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\AddNote;
use App\Http\Controllers\HomeEtudiantController;

use App\Http\Controllers\EventController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\Exams;
use App\Http\Controllers\MessageProfController;
use App\Http\Controllers\MessageSecretaryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\addAbsence;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EtudiantCont;
use App\Http\Controllers\FiltrerEtudiants;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\UpdateEtudiant;


use App\Http\Controllers\EmploiController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseAdController;
use App\Http\Controllers\ContactMessageController;

use Illuminate\Support\Facades\Auth;
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
    return view('index');
})->name("home");

Route::get('/l', function () {
    return view('home');
})->name("home2");


//-----------------------------aymane------------------------------
Auth::routes();

Route::get('/etudiant',[App\Http\Controllers\HomeEtudiantController::class, 'index'])->name('etudiant');
Route::get('/admin', [App\Http\Controllers\HomeAdminController::class, 'index'])->name('admin');
Route::get('/prof', [App\Http\Controllers\HomeProfController::class, 'index'])->name('prof');

Route::post('profexamen', [ExamenController::class, 'store'])->name('examens.store');
Route::post('addNote', [AddNote::class, 'store'])->name('note.store');
Route::post('addd_Etudiants', [FiltrerEtudiants::class, 'store'])->name('filtreretudiant');
Route::post('/registerEtudiant', [RegisterController::class, 'create'])->name('registerEtudiant');
Route::post('addAbsence', [addAbsence::class, 'store'])->name('absence.store2');
Route::post('note_etudiant', [NoteController::class, 'store'])->name('note.store2');
Route::get('edit_note/{id}', [NoteController::class, 'edit'])->name('note.edit');
Route::resource('notes', NoteController::class);
Route::resource('absence', Absence::class);
Route::resource('exams', Exams::class);
Route::resource('adminEtudiant', EtudiantCont::class);


Route::get('/profexamen', function () {
    return view('prof.exams',[
        "success"=>""
    ]);
})->name("examen");

Route::get('/absence_prof_etudiant', function () {
    return view('prof.absence');
})->name("absence_prof_etudiant");

Route::get('/prof_messages', function () {
    return view('prof.message');
})->name("messageFromStudent");

Route::get('/note', function () {
    return view('prof.note');
})->name("addNote");


Route::get('/add_Etudiant', function () {
    return view('admin.etudiants.index');
})->name("addEtudiant");

Route::get('/etude/{grp}', function ($grp) {
    return view('admin.etudiants.filter', ["grp" => $grp]);
})->name("etude");



// Route::middleware(["role:etudiants"])->group(function(){
//     Route::get("/etudiant",function(){
//         return "etudiant";
//     });
// });


//-----------------------------narjisse----------------------------

// Route::resource('etudiants', App\Http\Controllers\GroupesController::class);
// Route::resource('exams', App\Http\Controllers\GroupesController::class);
// Route::resource('events', App\Http\Controllers\GroupesController::class);
// Route::resource('messages', App\Http\Controllers\GroupesController::class);

Route::resource('filiéres', App\Http\Controllers\FiliéreController::class, ['names' => 'filiéres']);
Route::resource('modules', App\Http\Controllers\ModuleController::class, ['names' => 'modules']);
Route::resource('groupes', App\Http\Controllers\GroupeController::class, ['names' => 'groupes']);
Route::resource('profs', App\Http\Controllers\ProfController::class, ['names' => 'profs']);

Route::put('profs/{prof}', [App\Http\Controllers\ProfController::class, 'update'])->name('profs.update');
Route::resource('events', App\Http\Controllers\EventsController::class, ['names' => 'events']);
Route::get('/messages', [MessageSecretaryController::class, 'getMessages'])->name('Messages');
Route::post('/groupes/{id}', [GroupeController::class, 'update'])->name('groupes.update');

Route::get('/note/{id}', function ($id) {
    return view('etudiant.notes',compact('id'));
})->name("Notes");

Route::get('/Events', [EventController::class, 'getEvents'])->name('Events');
Route::get('/Exams',[ExamController::class,'getExams'])->name('Exams');
Route::get('/messageTeacher',[MessageProfController::class,'FormMessage'])->name('messageTeacher');
Route::post('/sendingMessage_prof',[MessageProfController::class,'sendMessage'])->name('Send_message_Teacher');
Route::get('/messageSecretary',[MessageSecretaryController::class,'FormMessage'])->name('messageSecretary');
Route::post('/sendingMessage_secretary',[MessageSecretaryController::class,'sendMessage'])->name('Send_message_secretary');
Route::get('/ContactForAdmin', function(){
    return view('admin.ContactAdmin.index');
})->name('ContactForAdmin');

Route::get('/absences/{id}',[Absence::class,'show'])->name('Absences');
//-----------------------------hraph-------------------------------


Route::get('/emploi', [EmploiController::class, 'index'])->name('Emploi');

 Route::get('/Courses', [CourseController::class, 'index'])->name('courses');
 Route::get('/Courses/{id}', [CourseController::class, 'show'])->name('Courses.show');
Route::get('/contact_',function(){
   return view('contact.index'); 
})->name('Contact');

Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
Route::get('/admin/contact', [ContactMessageController::class, 'getMessage'])->name('contactAdmin.index');

Route::resource('coursesAd', CourseAdController::class);
/// HistoryStatic
Route::get('/info',function(){
    return view('info'); 
})->name('inf');

Route::get('/About',function(){
    return view('DiscoverMore');
})->name('about');