<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <title>Clubbers</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @vite(['../resources/css/userPost.css', '../resources/js/Like/Like.js',  '../resources/js/app.js'])
    </head>
    

<body class="bg-fixed ..." style="background-image: url(images/feed/background.jpg)">
    <!--NAVBAR-->
    <nav class="items-center px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <img class="h-12 w-12 shadow-xl" src="images/feed/ClubbersLogo.png" alt="Clubbers">
                    <h1 class="invisible md:visible lg:visible">Clubbers</h1>
                </div>
                <div class="navbar-search-bar flex gap-4 p-2 bg-black backdrop-blur bg-opacity-40 rounded-2xl">
                    <button><i class="uil uil-search p-3 rounded-full hover:bg-white hover:bg-opacity-20"></i></button>
                    <input type="search" class="bg-black lg:px-20 py-2 rounded-full placeholder:text-center shadow-2xl" placeholder="connect with people...">
                </div>
                <div class="navbar-options items-center md:flex lg:flex lg:gap-4 gap-2">
                    <a href=""><img src="" class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white" alt="notification"></a>
                    <h1 class="invisible lg:visible">{{ Auth::user()->username}}</h1>
                    <a href=""><img src="" class="rounded-full h-12 w-12 shadow-xl" alt="profile-picture"></a>
                </div>
            </div>            
    </nav>


</body>
    











    <!-- <h1>Home Feed</h1>
    <h1>{{ Auth::user()->username}}</h1>
    <h1><strong><a href="/logout">LOGOUT</a></strong></h1>
    <h1>{{ Auth::user()->id}}</h1>

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
    @endforeach -->


</html>
