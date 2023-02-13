<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$event->name}}</title>
        @vite(['../resources/css/event.css', '../resources/js/app.js', '../resources/js/Event/event.js'])
    </head>
    <body class="bg-fixed object-fill" style="background-image: url({{url('images/feed/background2luce.jpg')}})">
    <!--NAVBAR-->
        <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <a href="/home" class="flex items-center">
                        <img class="h-12 w-12 shadow-xl" src="{{url('images/feed/ClubbersLogo.png')}}" alt="Clubbers Logo">
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
                    <a href=""><img src="{{url(App\Http\Controllers\ImageController::getProPic(Auth::user()->username))}}" class="rounded-full h-12 w-12 shadow-xl" alt="{{App\Http\Controllers\ImageController::getProPicAlt(Auth::user()->username)}}"></a>
                    <h2><a href="/logout"><strong>LOGOUT</strong></a></h2>
                </div>
            </div>            
        </nav>

    <!-- BODY -->
    <div class="py-36 md:py-36 lg:py-24 lg:grid grid-cols-3 justify-between text-slate-200">
        <div class="club-info">
            <div class="fixed w-[32%] p-3 top-34 flex items-center backdrop-blur bg-black bg-opacity-40 m-3 rounded-xl">
                <div class="profile-pic-club">
                    <img src="{{url(App\Http\Controllers\ImageController::getProPic($event->clubName))}}" class="h-20 w-20 rounded-full" alt="{{url(App\Http\Controllers\ImageController::getProPicAlt($event->clubName))}}"/>
                </div>
                <div class="name-club pl-8">
                    <a href="#">{{$event->clubName}}</a>
                    <p>{{App\Http\Controllers\Usercontroller::getAddress($event->clubName)}}</p>
                </div>
            </div>
        </div>

        <div class="event-real mt-4 rounded-xl bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl h-full">
            <div class="">
                <img class="rounded-t-xl" src="{{url(App\Http\Controllers\ImageController::getBannerUrl($event->id))}}" alt="{{url(App\Http\Controllers\ImageController::getBannerAlt($event->id))}}"/>
                <div class="event-name">
                    <div class="event-info flex justify-between p-2">
                        <h1 class="pl-5 p-2 text-5xl font-bold">{{$event->name}}</h1>
                    <div>
                    <p class="text-2xl">{{$event->Date}}</p>
                    <div class="flex items-center pl-[65%]">
                        <i class="uil uil-clock"></i>
                        <p class="text-2xl">{{$event->Time}}</p>
                    </div>
                </div>
            </div>
            <div class="event-info px-5 py-2">
                <div class="event-date flex text-center justify-between font-bold"></div>
                @if($event->onGoing == "True" && Auth::user()->type == "User")
                <div class="join-event-button">
                    <button id="partecipateButton" class=""></button>
                </div>
                @endif
                <p class="py-2">{{$event->description}}</p>
            </div>
        </div>
      </div>
    </div>
    
    <div class="m-2">
        <div class="post-container w-21 items-center text-slate-200 py-2">
            <div class="rounded-xl bg-black bg-opacity-50 backdrop-blur">
                <div class="relative overflow-hidden" id="carousel-container">
                    <div class="absolute overflow-hidden flex" id="carousel">
                        <!-- POST TEMPLATE Wo/event banner  -->
                        <div class="post-container rounded-xl bg-black bg-opacity-40 m-4">
                            <div class="post-user-info flex gap-3 ml-2 mt-2 items-center">
                                <img src="" alt="profile pic">
                                <a class="font-bold" href="">USERNAME</a>
                                <a href="">CLUB</a>
                            </div>
                            <div class="ml-2">
                                <p>song sei bellissimo</p>
                            </div>
                            <div class="post-buttons flex gap-2 p-2">
                                <div class="likes-interaction items-center gap-1 flex"> 
                                    <p id="likeNumber">-1</p>
                                    <button id="like-button" name=""><i class="uil uil-heart" id=""></i></button>
                                </div>
                                <div><button><i class="uil uil-tag"></i></button></div>
                            </div>
                        </div>

                        <div class="post-container rounded-xl bg-black bg-opacity-40 m-4">
                            <div class="post-user-info flex gap-3 ml-2 mt-2 items-center">
                                <img class="h-16 w-16 rounded-full"src="{{url(App\Http\Controllers\ImageController::getProPic(Auth::user()->username))}}" alt="profile pic">
                                <a class="font-bold" href="">USERNAME</a>
                                <a href="">CLUB</a>
                            </div>
                            <div class="ml-2">
                                <p>odio song</p>
                            </div>
                            <div class="post-buttons flex gap-2 p-2">
                                <div class="likes-interaction items-center gap-1 flex"> 
                                    <p id="likeNumber">110</p>
                                    <button id="like-button" name=""><i class="uil uil-heart" id=""></i></button>
                                </div>
                                <div><button><i class="uil uil-tag"></i></button></div>
                            </div>
                        </div>
                    </div>
                  </div>
                  
                  <div class="grid grid-cols-2 my-2">
                    <button id="prev-button" class="hover:bg-opacity-20 hover:bg-white rounded-bl-xl"><i class="uil uil-arrow-left"></i></button>
                    <button id="next-button" class="hover:bg-opacity-20 hover:bg-white rounded-br-xl"><i class="uil uil-arrow-right"></i></button>
                  </div>
            </div>
        </div>
        <script>
        const carouselContainer = document.querySelector("#carousel-container");
        const carousel = document.querySelector("#carousel");
        const prevButton = document.querySelector("#prev-button");
        const nextButton = document.querySelector("#next-button");
        
        let currentIndex = 0;
        const images = carousel.children;
        
        carouselContainer.style.width = "100%";
        carouselContainer.style.height = "200px";
        carousel.style.width = (images.length * 100) + "%";
        carousel.style.height = "100%";
        carousel.style.display = "flex";
        
        for (let i = 0; i < images.length; i++) {
          images[i].style.flex = "1";
          images[i].style.width = (100 / images.length) + "%";
        }
        
        prevButton.addEventListener("click", () => {
          currentIndex = Math.max(currentIndex - 1, 0);
          carousel.style.transform = `translateX(-${currentIndex * 100 / images.length}%)`;
        });
        
        nextButton.addEventListener("click", () => {
          currentIndex = Math.min(currentIndex + 1, images.length - 1);
          carousel.style.transform = `translateX(-${currentIndex * 100 / images.length}%)`;
        });
      </script>
    </div>
  </div>
</div>
</div>
</body>
</html>
