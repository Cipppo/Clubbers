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
    
<header>
    <!--NAVBAR-->
    <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
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
                    <h1><a href="/logout"><strong>LOGOUT</strong></a></h1>
                </div>
            </div>            
    </nav>
</header>
<body class="bg-fixed object-fill" style="background-image: url(images/feed/background.jpg)">
<div class="py-[5%] lg:grid grid-cols-3 justify-between text-slate-200" >
    <div class="left"></div>

    <div class="feed px-3">

    @php
        $posts = App\Http\Controllers\postClubberController::getAll();  
    @endphp


    @foreach ($posts as $post)
        <div class="w-21 items-center text-slate-200 py-2">
            <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                <div class ="post-banner rounded-t-lg object-fill">
                    <img class ="rounded-t-lg " src="images/try/Banner1.jpg" alt="banner">
                </div>
                <div class="post-Profile flex items-center gap-2 p-2">
                    <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="images/try/100x100.jpg" alt="profile picture">
                    <a class="post-Username" href="">{{$post->clubberUsername}}</a>
                    <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href="">{{$post->clubUsername}}</a>
                </div>
                    
                <div class="post-info p-2">
                    <p class="post-caption">{{$post->caption}}</p>
                </div>
                <div class="post-buttons flex gap-2 p-2">
                    <!-- <div class="p-1"><a href=""><img class="h-5 w-5" src="img/like-not-pressed.png" alt="like"></a></div> -->

                    <div class="likes-interaction items-center gap-1 flex"> 
                        <p id="likeNumber{{$post->id}}">0</p>
                        <button id="like-button" name="{{$post->id}}"><i class="uil uil-heart" alt="like"></i></button>
                    </div>
                    <div><button><i class="uil uil-comment"></i></button></div>
                    <div><button><i class="uil uil-tag"></i></button></div>
                   
                </div>
                    
            </div>
        </div>
    @endforeach

    </div>

    <div class="left"></div>

</div>


</body>

</html>
