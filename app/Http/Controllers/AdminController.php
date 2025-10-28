<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;
use App\Models\category;
use App\Models\Quiz;
use App\Models\mcqs;

class AdminController extends Controller
{
    //
    function login(Request $request){

        $validation = $request-> validate([
            "name"=>"required",
            "password"=>"required",
        ]);


        $admin = Admin::where([
            ['name',"=",$request->name],
            ['password',"=",$request->password],
        ])->first();

        if(!$admin){
             $validation = $request-> validate([
            "user"=>"required",
        ],[
            "user.required"=>"Invalid admin credentials"
        ]);

        }
           Session::put('admin',$admin);
            return redirect('/dashboard');
        // return $admin->name;
        // return view('admin');
    }

    function dashboard(){
        $admin= Session::get('admin');
        if($admin){
            return view('admin', ["name"=>$admin->name]);
        }else{
            return redirect('/admin-login');
        }
         
    }

    function categories(){
        $categories = category::get();
        $admin= Session::get('admin');
        if($admin){
            return view('categories', ["name"=>$admin->name,"categories"=>$categories]);
        }else{
            return redirect('/admin-login');
        }
    }

    function logout(){
        Session::forget('admin');
        return redirect('/admin-login');
    }

    function addCategory(Request $request){
        $validation = $request-> validate([
            "category"=>"required | min:3 | max:50 | unique:categories,name"
        ]);
        $admin= Session::get('admin');
        $category =  new category();
        $category->name = $request->category;
        $category->creator = $admin->name;
        if($category->save()){
            Session::flash('category', "Success : Category " .$request->category." added.");
        }
        return redirect('/admin-categories');
    }
    function deleteCategory($id){
        $isDeleted = Category::find($id)->delete(); 
        if($isDeleted){
            Session::flash('category', "Success : category deleted.");
            return redirect('/admin-categories');
        }
    }

   function addquiz(){
    Session::forget('quizDetails');
    $admin = Session::get('admin');
    $categories = category::get();

    if($admin){
        $quizName = request('quiz');
        $category_id = request('category_id');

        if($quizName && $category_id && !Session::has('quizDetails')){

            // Check if a quiz with same name already exists
            $existingQuiz = Quiz::where('name', $quizName)->first();

            if($existingQuiz){
                // Use existing quiz — don’t create duplicate
                Session::put('quizDetails', $existingQuiz);
            } else {
                // Create new quiz only if not exists
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if($quiz->save()){
                    Session::put('quizDetails', $quiz);
                }
            }
        }

        return view('add-quiz', ["name"=>$admin->name,"categories"=>$categories]);
    } else {
        return redirect('/admin-login');
    }
}


    function addmcqs(Request $request){
        $request-> validate([
            "question"=>"required | min:3 | max:255",
            "a"=>"required | min:1 | max:100",
            "b"=>"required | min:1 | max:100",
            "c"=>"required | min:1 | max:100",
            "d"=>"required | min:1 | max:100",
            "correct_ans"=>"required | in:a,b,c,d",
        ]);


         $admin = Session::get('admin');
        $quiz = Session::get ('quizDetails');
          $mcq = new mcqs();

        $mcq -> question = $request->question;
         $mcq -> a = $request->a;
          $mcq -> b = $request->b;
           $mcq -> c = $request->c;
            $mcq -> d = $request->d;

           $mcq -> correct_ans = $request->correct_ans;

           $mcq -> admin_id = $admin->id;
           $mcq -> quiz_id = $quiz->id;
           $mcq -> category_id = $quiz->category_id;
        // return $request;
        if($mcq->save()){
            if($request->submit == "add-more"){
                return redirect(url()->previous());
            }else{
                Session::forget('quizDetails');
                return redirect('/admin-categories');
              
            }
        }
    }

    function endQuiz(){
        Session::forget('quizDetails');
        return redirect('/admin-categories');
    }
}
