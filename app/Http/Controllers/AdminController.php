<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;
use App\Models\category;
use App\Models\Quiz;

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
        $admin= Session::get('admin');
        $categories = category ::get();
        if($admin){
            $quizName = request('quiz');
           $category_id = request('category_id');
            if($quizName && $category_id && !Session::has('quizDetails')){
                $quiz = new Quiz();
                $quiz -> name = $quizName;
                $quiz -> category_id = $category_id;
                if($quiz->save()){
                    Session::put('quizDetails', $quiz);
                }
            }

            return view('add-quiz', ["name"=>$admin->name,"categories"=>$categories]);
        }else{
            return redirect('/admin-login');
        }
    }
}
