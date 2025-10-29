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
        <h2 class="text-2xl text-center text-gray-800 mb-6">QuizName
            <a class="text-yellow-500 text-sm" href="/add-quiz">Back</a>
        </h2>
    <div class="w-200">
       
    <ul class="border border-gray-300 rounded-xl mt-5 p-5 space-y-3">
        <li class="p-2 font-bold bg-gray-200">
            <ul class="flex gap-10 justify-between">
                <li class="w-30">Mcq id</li>
                <li class="w-170">Question</li>
                
           
            </ul>  
        </li>
       @foreach($mcqs as $mcq)
        <li class="even:bg-gray-100 p-2">
            <ul class="flex gap-10 justify-between">
                <li class="w-30">{{$mcq->id}}</li>
                <li class="w-170">{{$mcq->question}}</li>
                
                   
                </li>
            </ul>
        </li>
        @endforeach
    </ul>
</div>
</div>

</body>
</html>