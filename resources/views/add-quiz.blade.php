<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar name={{$name}}></x-navbar>
     <div class="bg-gray-100 flex flex-col items-center min-h-screen  pt-5">
     <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        @if(!Session('quizDetails'))
        <h2 class="text-2xl text-center text-gray-800 mb-6">Add Quiz</h2>
        <form action="/add-quiz" method="get" class="space-y-4">
            <div>
                <input type="text" placeholder ="Enter Quiz name" name="quiz"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
               
            </div>
             <div>
                <select name="category_id"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
                @foreach($categories as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white">Add</button>
        </form>
        @else
        <span class="text-green-500 font-bold">Quiz : {{Session('quizDetails')->name}}</span>
       <h2 class="text-2xl text-center text-gray-800 mb-6">Add MCQS</h2>
       <form action="add-mcqs" method="post" class="space-y-4">
         <div> 
            @csrf
                <textarea placeholder ="Enter your question name" name="question"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none"></textarea>
               
            </div>
             <div>
                <input type="text" placeholder ="Option A" name="a"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
               
            </div>
             <div>
                <input type="text" placeholder ="Option B" name="b"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
               
            </div>
             <div>
                <input type="text" placeholder ="Option C" name="c"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
               
            </div>
             <div>
                <input type="text" placeholder ="Option D" name="d"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
               
            </div>
             <div>
                <select name="correct_ans"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
                <option value="">Select right answer</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                </select>
               
            </div>
             <button type="submit" name="submit" value="add-more" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add More</button>
            <button type="submit" name="submit" value="done" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white">Add and Submit</button>
       </form>
        @endif
    </div>
</div>
</body>