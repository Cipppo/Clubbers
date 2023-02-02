<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Post</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @vite(['../resources/css/userPost.css', '../resources/js/Like/Like.js',  '../resources/js/app.js'])
    </head>
    <h1>Home Feed</h1>
    <h1>{{ Auth::user()->username}}</h1>
    <h1><strong><a href="/logout">LOGOUT</a></strong></h1>
    <h1>{{ Auth::user()->id}}</h1>
    
    <!--NAVBAR-->
    <nav class="items-center px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <img class="h-12 w-12 shadow-xl" src="img/ClubbersLogo.png" alt="Clubbers">
                    <h1 class="invisible md:visible lg:visible">Clubbers</h1>
                </div>
                <div class="navbar-search-bar flex gap-2">
                    <input type="search" placeholder="connect with people...">
                    <i><img src="" alt="search-alt"></i>
                </div>
                <div class="navbar-options items-center md:flex lg:flex gap-2">
                    <a href="" class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white">create</a>
                    <a href=""><img src="" class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white" alt="notification"></a>
                    <a href=""><img src="img/shrek.jpg" class="rounded-full h-12 w-12 shadow-xl" alt="profile-picture"></a>
                </div>
            </div>            
        </nav>








    @php
        $posts = App\Http\Controllers\postClubberController::getAll();  
    @endphp


    @foreach ($posts as $post)
        <div data-post="{{$post->id}}">
            <h1>-----</h1>
            <h1>{{$post->clubberUsername}} ha postato</h1>
            <h3><strong>{{$post->caption}}</strong> al {{$post->clubUsername}}</h3>
            <h6>Questo post ha <div class='inline' id="likeNumber{{$post->id}}"></div> likes</h6>
            <button id="like-button" name="{{$post->id}}">METTI LIKE</button>
        </div>
    @endforeach


</html>
