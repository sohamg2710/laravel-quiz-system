<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-user-navbar></x-user-navbar>
   
    <div class="bg-gray-100 flex flex-col items-center min-h-screen  pt-5">
        <h2 class="text-2xl text-center text-green-800 mb-6 font-bold">Category Name : {{$category}}
         
    <div class="w-200">
       
    <ul class="border border-gray-300 rounded-xl mt-5 p-5 space-y-3">
        <li class="p-2 font-bold bg-gray-200">
            <ul class="flex gap-10 justify-between">
                <li class="w-30">Quiz id</li>
                <li class="w-140">Name</li>
                <li class="w-30">Action</li>
           
            </ul>
        </li>
        @foreach($quizData as $item)
        <li class="even:bg-gray-100 p-2">
            <ul class="flex gap-10 justify-between">
                <li class="w-30">{{$item->id}}</li>
                <li class="w-140">{{$item->name}}</li>
                <li> <a href="#" class="text-green-500 font-bold ">
                       Attempt Quiz
                    </a>
                   </li>   
                </li>
            </ul>
        </li>
        @endforeach
    </ul>
</div>
</div>

</body>
</html>