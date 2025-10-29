<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar name={{$name}}></x-navbar>
    @if(Session('category'))
        <div class="bg-green-800 text-white pl-5">{{Session('category')}}</div>
    @endif
    <div class="bg-gray-100 flex flex-col items-center min-h-screen  pt-5">
     <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl text-center text-gray-800 mb-6">Add category</h2>
        <form action="/add-category" method="post" class="space-y-4">
            @csrf
            <div>
                <input type="text" placeholder ="Enter category name" name="category"
                class="w-full px-4 py-2 border-gray-300 rounded-xl focus:outline-none ">
                @error('category')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white">Add</button>
        </form>
    </div>
    <div class="w-200">
        <h1 class="text-2xl text-blue-500">Category List</h1>
    <ul class="border border-gray-300 rounded-xl mt-5 p-5 space-y-3">
        <li class="p-2 font-bold bg-gray-200">
            <ul class="flex gap-10 justify-between">
                <li class="w-30">S.no</li>
                <li class="w-70">Name</li>
                <li class="w-70">Creator</li>
                <li class="w-30">Action</li>
            </ul>
        </li>
        @foreach($categories as $category)
        <li class="even:bg-gray-100 p-2">
            <ul class="flex gap-10 justify-between">
                <li class="w-30">{{$category->id}}</li>
                <li class="w-70">{{$category->name}}</li>
                <li class="w-70">{{$category->creator}}</li>
                <li class="w-30 flex gap-4">
                    <a href="category/delete/{{$category->id}}">
                         <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#000000"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/></svg>
                    </a>

                    <a href="quiz-list/{{$category->id}}/{{$category->name}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#000000"><path d="M480-312q70 0 119-49t49-119q0-70-49-119t-119-49q-70 0-119 49t-49 119q0 70 49 119t119 49Zm0-72q-40 0-68-28t-28-68q0-40 28-68t68-28q40 0 68 28t28 68q0 40-28 68t-68 28Zm0 192q-142.6 0-259.8-78.5Q103-349 48-480q55-131 172.2-209.5Q337.4-768 480-768q142.6 0 259.8 78.5Q857-611 912-480q-55 131-172.2 209.5Q622.6-192 480-192Zm0-288Zm0 216q112 0 207-58t146-158q-51-100-146-158t-207-58q-112 0-207 58T127-480q51 100 146 158t207 58Z"/></svg>
                    </a>
                   
                </li>
            </ul>
        </li>
        @endforeach
    </ul>
</div>
</div>

</body>
</html>