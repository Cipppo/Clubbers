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

    <body class="bg-fixed object-fill" style="background-image: url({{url('images/feed/background2luce.jpg')}})>

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
                    <h1 class="invisible lg:visible">{{ Auth::user()->username}}</h1>
                    <a href=""><img src="" class="rounded-full h-12 w-12 shadow-xl" alt="profile-picture"></a>
                    <h1><a href="/logout"><strong>LOGOUT</strong></a></h1>

                </div>
            </div>            
        </nav>
</html>