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
     <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl text-center text-gray-800 mb-6">Add Quiz</h2>
        <form action="/add-quiz" method="get" class="space-y-4">
            <div>
                <input type="text" placeholder ="Enter Quiz name" name="quiz"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
               
            </div>
             <div>
                <select type="text" name="category"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
                @foreach($categories as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white">Add</button>
        </form>
    </div>
</div>
</body>