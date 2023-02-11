<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Clubbers</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['../resources/css/userPost.css', 
    '../resources/js/Like/Like.js',  
    '../resources/js/app.js', 
    '../resources/css/styleCalendario.css', 
    '../resources/js/Calendario/script.js'])
</head>
    



<body class="bg-fixed object-fill" style="background-image: url(images/feed/background2luce.jpg)">
    @php
        $posts = App\Http\Controllers\postClubberController::getAll();  
        $events = App\Http\Controllers\EventController::getFollowedEvents(Auth::id());
        if(Auth::user()->type == "User"){
            $events = App\Http\Controllers\EventController::getFollowedEvents(Auth::id());
        }else{
            $events = App\Http\Controllers\EventController::getCreatedEvents(Auth::user()->username);
        }
    @endphp
    <!--NAVBAR-->
    <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <a href="/home">
                        <img class="h-12 w-12 shadow-xl" src="images/feed/ClubbersLogo.png" alt="Clubbers">
                        <h2 class="invisible md:visible lg:visible">Clubbers</h2>
                    </a>
                </div>
                <div class="navbar-search-bar flex gap-4 p-2 bg-black backdrop-blur bg-opacity-40 rounded-2xl">
                    <button><i class="uil uil-search p-3 rounded-full hover:bg-white hover:bg-opacity-20"></i></button>
                    <input type="search" class="bg-black lg:px-20 py-2 rounded-full placeholder:text-center shadow-2xl" placeholder="connect with people...">
                </div>
                <div class="navbar-options items-center md:flex lg:flex lg:gap-4 gap-2">
                    <a href=""><img src="" class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white" alt="notification"></a>
                    <h2 class="invisible lg:visible">{{ Auth::user()->username}}</h2>
                    <a href=""><img src="{{App\Http\Controllers\ImageController::getProPic(Auth::user()->username)}}" class="rounded-full h-12 w-12 shadow-xl" alt="{{App\Http\Controllers\ImageController::getProPicAlt(Auth::user()->username)}}"></a>
                    <h2><a href="/logout"><strong>LOGOUT</strong></a></h2>
                </div>
            </div>            
    </nav>


    <div class="py-36 md:py-36 lg:py-24 lg:grid grid-cols-3 justify-between text-slate-200" >
        
        @if(Auth::user()->type == "User")
        <div class="left p-2 mt-4">
            <div class="upload-button sticky-top fixed w-full md:w-full lg:w-[32%] text-center">
                <div class="p-2 rounded-xl bg-black bg-opacity-50 backdrop-blur shadow-2xl hover:bg-white hover:bg-opacity-20">
                    <a href="/post/create">UPLOAD A NEW POST</a>
                </div>
                <div class="contianer flex relative justify-center pt-[2%]">
                    <div class="calendar w-full pt-8 px-12 shadow-xl rounded-2xl h-[610px] bg-black bg-opacity-40 backdrop-blur text-slate-200 overflow-hidden">
                        <div class="calendar-header p-2 flex justify-between items-center bg-black bg-opacity-20 rounded-2xl font-weight-bold">
                            <span class="month-picker hover:font-bold rounded-lg pt-1 pl-3 cursor-pointer" id="month-picker"> May </span>
                            <div class="year-picker flex items-center" id="year-picker">
                                <span class="year-change" id="pre-year">
                                    <span><</span>
                                </span>
                                <span id="year" class="hover:scale-105 hover:font-bold">2020 </span>
                                <span class="year-change" id="next-year">
                                    <span>></span>
                                </span>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <div class="calendar-week-days grid grid-cols-7 cursor-pointer font-bold place-items-center pt-12">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="calendar-days grid grid-cols-7 gap-[5px]"></div>
                        </div>
                        <div class="month-list z-30 position-fixed top-[50px] text-slate-200 bg-black bg-opacity-90 backdrop-blur-3xl grid grid-cols-3 rounded-xl gap-1"></div>
                        <div class="events py-2 grid grid-cols-1 gap-2 position-relative mt-[-190px]">

                        <!-- EVENTS TEMPLATE -->
                        <div id="calendarEventContainer">
                        </div> 
                    </div>
                    </div>
                </div>
            </div>
        </div> 
        @else
        <div class="left p-2 mt-4">
            <div class="upload-button sticky-top fixed w-full md:w-full lg:w-[32%] text-center">
                <div class="p-2 rounded-xl bg-black bg-opacity-50 backdrop-blur shadow-2xl hover:bg-white hover:bg-opacity-20">
                    <a href="/post/create">UPLOAD A NEW POST</a>
                </div>
                <div class="p-2 rounded-xl mt-2 bg-black bg-opacity-50 backdrop-blur shadow-2xl hover:bg-white hover:bg-opacity-20">
                    <a href="/event/create">CREATE A NEW EVENT</a>
                </div>
            </div>
        </div>
        @endif



        <div class="feed px-2">

        @foreach ($posts as $post)
            <div class="w-21 items-center text-slate-200 py-2 mt-4">
                <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                    <div class ="post-banner rounded-t-lg object-fill">
                        <img class ="rounded-t-lg " src="{{App\Http\Controllers\ImageController::getBannerUrl($post->eventId)}}" alt="{{App\Http\Controllers\ImageController::getBannerAlt($post->eventId)}}">
                    </div>
                    <div class="post-Profile flex items-center gap-2 p-2">
                        <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="{{App\Http\Controllers\ImageController::getProPic($post->clubberUsername)}}" alt="{{App\Http\Controllers\ImageController::getProPicAlt($post->clubberUsername)}}">
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
                            <button id="like-button{{$post->id}}" name="{{$post->id}}"><i class="uil uil-heart" id="likeIcon{{$post->id}}"></i></button>
                        </div>
                        <div><button><i class="uil uil-comment" ></i></button></div>
                        <div><button><i class="uil uil-tag"></i></button></div>
                    
                    </div>
                        
                </div>
            </div>
        @endforeach
        </div>

        <div class="right p-2 mt-4">
            
            <div class="upcoming-events rounded-xl bg-black bg-opacity-50 backdrop-blur shadow-2xl sticky-top fixed w-[32%]">

                

                <div class="py-4 px-2">
                    @if(Auth::user()->type == "User")
                        <h1 class="rounded-xl bg-black bg-opacity-50 p-3 text-center" >YOUR UPCOMING EVENTS</h1>
                    @else
                    <h1 class="rounded-xl bg-black bg-opacity-50 p-3 text-center" >YOUR SCHEDULED EVENTS</h1>
                    @endif
                    <div class="events py-2 grid grid-cols-1 gap-2">

                        <!-- EVENTS TEMPLATE -->
                        @foreach($events as $event)
                        <a href="/event/show/{{$event->id}}">
                            <div class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-103  duration-300">
                                <div class="events-bg-img bg-cover w-full h-24 rounded-xl" style="background-image: url({{App\Http\Controllers\ImageController::getBannerUrl($event->id)}})">
                                    <div class="hover:bg-black hover:bg-opacity-20 hover:backdrop-blur-sm rounded-xl hover:delay-200">
                                        <div class="event-real rounded-xl h-24 bg-black bg-opacity-60 p-3 items-center">
                                            <div class="text-center flex justify-center">
                                            </div>
                                            <div class="justify-center flex gap-2 w-full">
                                                <p class="mt-2 text-2xl">{{$event->name}}</p>
                                            </div>
                                            <div class="flex justify-between w-full px-7 pt-3">
                                                <p class="invisible xl:visible">{{$event->shortDescription}}</p>
                                                <p>{{$event->Date}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>

    </div>


</body>

</html>