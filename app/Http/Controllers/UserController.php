<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\quiz;

class UserController extends Controller
{
    //
    function welcome(){
          $categories = category::withCount('quizzes')->get();
        // $categories = category::get();
        return view('welcome', ["categories"=>$categories]);
    }


    function userQuizList($id, $category){
       
      $quizData = Quiz::where('category_id', $id)->get();
            return view('user-quiz-list', ["quizData"=>$quizData, "category"=>$category]);
       
    }
}
