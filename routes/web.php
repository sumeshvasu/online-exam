<?php
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionAnswerController;
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
    return view('welcome');
});

Route::get('/exam', [ExamController::class, 'index'])->name('exam');
Route::post('/validate-user', [ExamController::class, 'validateUser'])->name('validate-user');
Route::post('/validate-exam', [ExamController::class, 'validateExam'])->name('validate-exam');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/list', [QuestionAnswerController::class, 'index'])->name('question_answer.list');
    Route::get('/create', [QuestionAnswerController::class, 'create'])->name('question_answer.create');
    Route::post('/store', [QuestionAnswerController::class, 'store'])->name('question_answer.store');
    Route::get('/score', [ExamController::class, 'score'])->name('exam.score');
});

require __DIR__ . '/auth.php';
