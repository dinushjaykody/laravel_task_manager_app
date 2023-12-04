<?php

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

//
//class Task
//{
//    public function __construct(
//    public int $id,
//    public string $title,
//    public string $description,
//    public ?string $long_description,
//    public bool $completed,
//    public string $created_at,
//    public string $updated_at
//  ) {
//  }
//}
//
//$tasks = [
//    new Task(
//        1,
//        'Buy groceries',
//        'Task 1 description',
//        'Task 1 long description',
//        false,
//        '2023-03-01 12:00:00',
//        '2023-03-01 12:00:00'
//    ),
//    new Task(
//        2,
//        'Sell old stuff',
//        'Task 2 description',
//        null,
//        false,
//        '2023-03-02 12:00:00',
//        '2023-03-02 12:00:00'
//    ),
//    new Task(
//        3,
//        'Learn programming',
//        'Task 3 description',
//        'Task 3 long description',
//        true,
//        '2023-03-03 12:00:00',
//        '2023-03-03 12:00:00'
//    ),
//    new Task(
//        4,
//        'Take dogs for a walk',
//        'Task 4 description',
//        null,
//        false,
//        '2023-03-04 12:00:00',
//        '2023-03-04 12:00:00'
//    ),
//];
//
//Route::get('/', function () {
//    return redirect()->route('tasks.index');
//});
//
//Route::get('/tasks', function () use ($tasks) {
//})->name('tasks.index');
//
//Route::get('/tasks/{id}', function ($id) use ($tasks) {
//    $task = collect($tasks)->firstWhere('id', $id);
//
//    if (!$task) {
//        abort(\Illuminate\Http\Response::HTTP_NOT_FOUND);
//    }
//
//    return view('show', ['task' => $task]);
//})->name('tasks.show');


use App\Http\Controllers\TaskController;
//Route::get('/', function () {
//    return redirect()->route('tasks.index');
//});


Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::patch('/tasks/{task}/reopen', [TaskController::class, 'reopen'])->name('tasks.reopen');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
