<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <title>Clubbers</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" >
        @vite(['../resources/css/postClubCreate.css',  '../resources/js/app.js', '../resources/js/User/UserPage.js', '../resources/js/Like/Like.js'])
    </head>

    <body class="bg-fixed object-fill" style="background-image: url({{url('images/feed/background2luce.jpg')}})">

    <!-- NAVBAR -->
    <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <a href="/home" class="flex items-center">
                        <img class="h-12 w-12 shadow-xl" src="{{url('images/feed/ClubbersLogo.png')}}" alt="Clubbers">
                        <h2 class="invisible md:visible lg:visible">Clubbers</h2>
                    </a>
                </div>
                <div class="navbar-search-bar flex gap-4 p-2 bg-black backdrop-blur bg-opacity-40 rounded-2xl">
                    <form action="/search" class="flex" method="POST" enctype="multipart/form-data">
                    @csrf
                        <button type="submit"><i class="uil uil-search p-3 rounded-full hover:bg-white hover:bg-opacity-20"></i></button>
                        <div class="autocomplete">
                        <label for="myInput">
                        <input id="myInput" name="myInput" type="text" class="bg-black lg:px-20 py-2 rounded-full placeholder:text-center shadow-2xl" placeholder="connect with people...">
                        </div>
                    </form>
                </div>
                <div class="navbar-options items-center md:flex lg:flex lg:gap-4 gap-2">
                    <a href="/notifications" class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white"><i class="uil uil-bell"></i></a>
                    <h2 class="invisible lg:visible">{{ Auth::user()->username}}</h2>
                    <a href="/user/show/{{Auth::user()->id}}"><img src="{{url(App\Http\Controllers\ImageController::getProPic(Auth::user()->username))}}" class="rounded-full h-12 w-12 shadow-xl" alt="{{App\Http\Controllers\ImageController::getProPicAlt(Auth::user()->username)}}"></a>
                    <h2><a href="/logout"><strong>LOGOUT</strong></a></h2>
                </div>
            </div>            
    </nav>

        <div class="py-36 md:py-36 lg:py-24 text-slate-200 sticky">
        <div class="grid grid-cols-4">
            <div class="col-span-1"></div>
            <!-- user profile -->
            <div class="col-span-2 m-2">
                <div class="profile-container bg-black bg-opacity-40 backdrop-blur shadow-xl rounded-xl">
                    <div class="profile-all flex p-10">
                        <img class="h-28 w-28 rounded-full" src="{{url(App\Http\Controllers\ImageController::getProPic($user->username))}}" alt="{{App\Http\Controllers\ImageController::getProPicAlt($user->username)}}">
                        <div class="profile-info lg:grid grid-cols-2 w-full ml-12">
                            <h1 id="Username" class="font-bold text-2xl ml-2">{{$user->username}}</h1>
                            <div class="profile-numbers flex gap-12 p-3">
                                <div class="followers text-center">
                                    <p>followers</p>
                                    <p id="FollowersCounter"></p>
                                </div>
                                <div class="follow text-center">
                                    <p>follow</p>
                                    <p id="followCounter"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($user->id != Auth::user()->id)
                    <div class="pb-2 pl-4"><button id="followButton"></button></div>
                    @endif
                    <div class="profile-bio ml-10 pb-10">
                        @if($user->type == "Club")
                        <div class="flex gap-1">
                            <i class="uil uil-map-marker"></i>
                            <p class >{{App\Http\Controllers\Usercontroller::getAddress($user->username)}}</p>
                        </div>
                        @endif
                    </div>
                    <div class="profile-buttons grid grid-cols-2 text-center">
                        @if($user->type == "User")
                        <button id="postButton" class="profile-post hover:bg-white hover:bg-opacity-10 hover:rounded-bl-xl p-3 border-t border-slate-300 border-opacity-40">posts</button>
                        <button id="eventButton" class="profile-post hover:bg-white hover:bg-opacity-10 hover:rounded-br-xl p-3 border-t border-slate-300 border-opacity-40">events</button>
                        @endif
                    </div>
                </div>
            </div> 
            <div class="col-span-1"></div>
        </div>
        
        @if($user->type == "User")
            <div class="grid grid-cols-3 justify-between text-slate-200" >
                <div></div>
                <!-- USER POSTS -->
                <div class="user-posts" id="container">


                </div>
                <div></div>
            </div>
            
            </div>
        @else   
        <div class="grid grid-cols-3 justify-between text-slate-200" >
            <div></div>
            
            <div class="container-events-club p-2 ">
                <div class='w-full text-center bg-black bg-opacity-40 backdrop-blur shadow-xl rounded-xl'>
                    <p class="p-3 font-bold">NEXT EVENTS</p>
                    @php
                        $events = \App\Http\Controllers\EventController::getAllOnGoingClubEvents($user->username);
                    @endphp
                    @foreach($events as $event)
                        <a href="/event/show/{{$event->id}}">
                            <div class="transition p-2 ease-in-out delay-150 hover:-translate-y-1 hover:scale-103  duration-300">
                                <div class="events-bg-img bg-cover h-24 rounded-xl" style="background-image: url({{url(App\Http\Controllers\ImageController::getBannerUrl($event->id))}})">
                                    <div class="hover:bg-black hover:bg-opacity-20 hover:backdrop-blur-sm rounded-xl hover:delay-200">
                                        <div class="event-real rounded-xl h-24 bg-black bg-opacity-60 p-3 items-center">
                                            <div class="text-center flex justify-center"></div>
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
            

            <div></div>

        </div>


        @endif

</html>