<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <title>Clubbers</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" >
        @vite(['../resources/css/postClubCreate.css',  '../resources/js/app.js'])
    </head>

    <body class="bg-fixed object-fill" style="background-image: url({{url('images/feed/background2luce.jpg')}})">

    <!-- NAVBAR -->
        <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo">
                    <a href="/home" class="flex gap-2 items-center">
                        <img class="h-12 w-12 shadow-xl" src="../images/feed/ClubbersLogo.png" alt="Clubbers">
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
                    <a href=""><img src="" class="rounded-full h-12 w-12 shadow-xl" alt="profile-picture"></a>
                    <h1><a href="/logout"><strong>LOGOUT</strong></a></h1>
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
                        <img class="h-28 w-28 rounded-full" src="../images/proPics/shrek.jpg" alt="profile picture">
                        <div class="profile-info items-center ml-12">
                            <h1 class="font-bold text-2xl ml-2">Username</h1>
                            <div class="profile-numbers flex gap-12 p-3">
                                <div class="followers text-center">
                                    <p>followers</p>
                                    <p>500</p>
                                </div>
                                <div class="follow text-center">
                                    <p>follow</p>
                                    <p>90</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-bio ml-10 pb-10">
                        <p>non so bene cosa scrivere ma qua ce la bio</p>
                    </div>
                    <div class="profile-buttons grid grid-cols-2 text-center">
                        <a href=""><div class="profile-post hover:bg-white hover:bg-opacity-10 p-3 border-t border-slate-300 border-opacity-40"><p>posts</p></div></a>
                        <a href=""><div class="profile-post hover:bg-white hover:bg-opacity-10 p-3 border-t border-slate-300 border-opacity-40"><p>events</p></div></a>
                    </div>
                </div>
            </div> 
            <div class="col-span-1"></div>
        </div>
            
        <div class="grid grid-cols-3 justify-between text-slate-200" >
            <div></div>
            <div class="user-posts">

                <div class="w-21 items-center text-slate-200 py-2">
                    <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                        <div class ="post-banner rounded-t-lg object-fill">
                            <img class ="rounded-t-lg " src="" alt="">
                        </div>
                        <div class="post-Profile flex items-center gap-2 p-2">
                            <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="">
                            <a class="post-Username" href=""></a>
                            <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href=""></a>
                        </div>
                            
                        <div class="post-info p-2">
                            <p class="post-caption"></p>
                        </div>
                        <div class="post-buttons flex gap-2 p-2">
                            <div class="likes-interaction items-center gap-1 flex"> 
                                <p id=""</p>
                                <button id="" name=""><i class="uil uil-heart" id=""></i></button>
                            </div>
                            <div><button><i class="uil uil-comment" ></i></button></div>
                            <div><button><i class="uil uil-tag"></i></button></div>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
        
        </div>

</html>