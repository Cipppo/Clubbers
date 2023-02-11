<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{$event->name}}</title>
    @vite(['../resources/css/event.css'])
  </head>
  <body class="bg-fixed object-fill" style="background-image: url({{url('images/feed/background2luce.jpg')}})">
    <!--NAVBAR-->
    <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <a href="/home" class="flex items-center">
                        <img class="h-12 w-12 shadow-xl" src="../../images/feed/ClubbersLogo.png" alt="Clubbers">
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

    <!-- BODY -->
    <div
      class="py-36 md:py-36 lg:py-24 lg:grid grid-cols-3 justify-between text-slate-200"
    >
      <div class="club-info">
        <div
          class="fixed w-[32%] p-3 top-34 flex items-center backdrop-blur bg-black bg-opacity-40 m-3 rounded-xl"
        >
          <div class="profile-pic-club">
            <img
              src="{{url(App\Http\Controllers\ImageController::getProPic($event->clubName))}}"
              class="h-20 w-20 rounded-full"
              alt="{{url(App\Http\Controllers\ImageController::getProPicAlt($event->clubName))}}"
            />
          </div>
          <div class="name-club pl-8">
            <a href="#">{{$event->clubName}}</a>
            <p>via fiorenzuola</p>
        </div>
        </div>
      </div>
      <div
        class="event-real mt-4 rounded-xl bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl h-full"
      >
        <div class="">
          <img class="rounded-t-xl" src="{{url(App\Http\Controllers\ImageController::getBannerUrl($event->id))}}" alt="{{url(App\Http\Controllers\ImageController::getBannerAlt($event->id))}}"/>
          <div class="event-name">
            <h1 class="pl-5 p-2 text-5xl font-bold">{{$event->name}}</h1>
            <div class="event-info px-5 py-2">
              <div
                class="event-date flex text-center justify-between font-bold">
                <p class="text-2xl">{{$event->Date}}</p>
                <div class="flex items-center">
                  <i class="uil uil-clock"></i>
                  <p class="text-2xl">{{$event->Time}}</p>
                </div>
              </div>
              <div class="join-event-button">
                <button class="p-3 bg-green-500 rounded-xl my-2 font-semibold hover:bg-green-700 shadow-lg">JOIN EVENT!</button>
              </div>
              <p class="py-2">
                {{$event->description}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
