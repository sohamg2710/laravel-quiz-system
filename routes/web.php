<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class,'welcome']);
 Route::view('/admin-login', 'admin-login');
  Route::get('user-quiz-list/{id}/{category}', [UserController::class,'userQuizList']);

 Route::post('/admin-login',[AdminController::class,'login']);
 Route::get('/dashboard',[AdminController::class,'dashboard']);
 Route::get('/admin-categories',[AdminController::class,'categories']);
 Route::get('/admin-logout',[AdminController::class,'logout']); 
 Route::post('/add-category',[AdminController::class,'addCategory']);
 Route::get('/category/delete/{id}',[AdminController::class,'deleteCategory']);
 Route::get('/add-quiz', [AdminController::class,'addquiz']);
 Route::post('/add-mcqs', [AdminController::class,'addmcqs']); 
 Route::get('/end-quiz', [AdminController::class,'endQuiz']);
 Route::get('/show-quiz/{id}/{quizName}', [AdminController::class,'showQuiz']);
 Route::get('quiz-list/{id}/{category}', [AdminController::class,'quizList']);