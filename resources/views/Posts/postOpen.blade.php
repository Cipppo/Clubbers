<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <title>Clubbers</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" >
        @vite(['../resources/css/postClubCreate.css',  '../resources/js/app.js', '../resources/js/Post/postPage.js'])
    </head>

    <body class="bg-fixed object-fill" style="background-image: url({{url('images/feed/background2luce.jpg')}})">
        <!--NAVBAR-->
        <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo">
                    <a href="/home" class="flex gap-2 items-center">
                        <img class="h-12 w-12 shadow-xl" src="{{url('../images/feed/ClubbersLogo.png')}}" alt="Clubbers">
                        <h2 class="invisible md:visible lg:visible">Clubbers</h2>
                    </a>
                </div>
                <div class="navbar-search-bar flex gap-4 p-2 bg-black backdrop-blur bg-opacity-40 rounded-2xl">
                    <button><i class="uil uil-search p-3 rounded-full hover:bg-white hover:bg-opacity-20"></i></button>
                    <input type="search" class="bg-black lg:px-20 py-2 rounded-full placeholder:text-center shadow-2xl" placeholder="connect with people...">
                </div>
                <div class="navbar-options items-center md:flex lg:flex lg:gap-4 gap-2">
                    <a href=""><img src="" class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white" alt="notification"></a>
                    <h1 class="invisible lg:visible">{{ Auth::user()->username}}</h1>
                    <a href="/user/show/{{Auth::user()->id}}"><img src="{{url(App\Http\Controllers\ImageController::getProPic(Auth::user()->username))}}" class="rounded-full h-12 w-12 shadow-xl" alt="{{App\Http\Controllers\ImageController::getProPicAlt(Auth::user()->username)}}"></a>
                    <h1><a href="/logout"><strong>LOGOUT</strong></a></h1>
                </div>
            </div>            
        </nav>
        <div class="lg:grid grid-cols-3 pt-24 text-slate-200">
            <div>
                
            </div>
            <div>
                <div class="post-container mt-2 p-3 bg-black bg-opacity-40 backdrop-blur rounded-xl shadow-2xl">
                    <div class="user-info flex">
                        <div class="post-Profile flex items-center gap-2 p-2">
                            <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="{{url(App\Http\Controllers\ImageController::getProPic($post->clubberUsername))}}" alt="{{App\Http\Controllers\ImageController::getProPicAlt($post->clubberUsername)}}">
                            <a class="post-Username" href="/user/show/{{App\Http\Controllers\Usercontroller::getIdByUsername($post->clubberUsername)}}">{{$post->clubberUsername}}</a>
                            <a class="post-clubTag rounded-full bg-black p-1 px-2 bg-opacity-40 hover:bg-white hover:bg-opacity-20" href="/user/show/{{App\Http\Controllers\Usercontroller::getIdByUsername($post->clubUsername)}}">{{$post->clubUsername}}</a>
                            <a class="rounded-full bg-black p-1 px-2 bg-opacity-40 hover:bg-white hover:bg-opacity-20" href="/event/show/{{$post->eventId}}">{{App\Http\Controllers\EventController::getEventNameById($post->eventId)}}</a>
                        </div>
                        
                    </div>
                    <div class="relative overflow-hidden" id="carousel-container">
                        <div class="absolute overflow-hidden" id="carousel">
                            @php
                                $eventName = App\Http\Controllers\EventController::getEventNameById($post->eventId);
                                $pics = App\Http\Controllers\ImageController::getPostClubberPics($post->clubberUsername, $eventName);
                                $comments = App\Http\Controllers\commentController::getPostComments($post->id);
                            @endphp
                            @foreach($pics as $pic)
                            <img src="{{url($pic->URL)}}" class="w-64 h-auto object-scale-down" alt="{{$pic->alt}}">
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 my-2">
                        <button id="prev-button" class="hover:bg-opacity-20 hover:bg-white rounded-l-lg"><i class="uil uil-arrow-left"></i></button>
                        <button id="next-button" class="hover:bg-opacity-20 hover:bg-white rounded-r-lg"><i class="uil uil-arrow-right"></i></button>
                    </div>
                </div>

                
                <div class="comments-container rounded-xl bg-black bg-opacity-40 backdrop-blur p-2 mt-2" id="commentsContainer">
                    <h1 class="text-2xl"><strong>Comments</strong></h1>
                    <!--COMMENT TEMPLATE-->
                    @foreach($comments as $comment)
                        <div class="comment-layout flex p-2 gap-2 m-2">
                            <img class="post-profilePicture object-fill h-14 w-14  rounded-full" src="{{url(App\Http\Controllers\ImageController::getProPic($comment->clubberUsername))}}" alt="{{App\Http\Controllers\ImageController::getProPicAlt($comment->clubberUsername)}}">
                            <div><a class="post-Username font-bold" href="/user/show/{{App\Http\Controllers\Usercontroller::getIdByUsername($comment->clubberUsername)}}">{{$comment->clubberUsername}}</a><p>{{$comment->caption}}</p></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                @if(Auth::user()->type == "User")
                    <div class="comment-button ml-2 mt-2 sticky-right fixed w-full md:w-full lg:w-[32%] text-center">
                        <div>
                            <div class="flex items-center justify-center w-full">
                                <label for="comment" name="commentLabel" class="w-full bg-black bg-opacity-40 backdrop-blur rounded-xl">
                                <div class="flex justify-between p-2">
                                    <div><h2><strong>Comment this post!</strong></h2></div>
                                    <p class="inline text-right" id="charCounter">0/50</p>
                                </div>
                                <textarea id="comment" name="comment" maxlength="50" class="bg-black bg-opacity-40 w-full rounded-xl"></textarea>
                                <div class="flex justify-between p-2">
                                    <div></div>
                                    <div><button id="sendComment" name="sendComment" class="p-2 bg-blue-900 rounded-xl "><strong>SEND</strong></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <script>

        </script>
    </body>
</html>


