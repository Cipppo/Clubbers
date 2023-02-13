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
        <!--NAVBAR-->
        <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <a href="/home" class="flex items-center">
                        <img class="h-12 w-12 shadow-xl" src="img/ClubbersLogo.png" alt="Clubbers">
                        <h2 class="invisible md:visible lg:visible">Clubbers</h2>
                    </a>
                </div>
                <div class="navbar-search-bar flex gap-4 p-2 bg-black backdrop-blur bg-opacity-40 rounded-2xl">
                    <button><i class="uil uil-search p-3 rounded-full hover:bg-white hover:bg-opacity-20"></i></button>
                    <input type="search" class="bg-black lg:px-20 py-2 rounded-full placeholder:text-center shadow-2xl" placeholder="connect with people...">
                </div>
                <div class="navbar-options items-center md:flex lg:flex lg:gap-4 gap-2">
                    <a href=""><img src="" class="bg-white bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white" alt="notification"></a>
                    <h2 class="invisible lg:visible">{{ Auth::user()->username}}</h2>
                    <a href=""><img src="{{App\Http\Controllers\ImageController::getProPic(Auth::user()->username)}}" class="rounded-full h-12 w-12 shadow-xl" alt="{{App\Http\Controllers\ImageController::getProPicAlt(Auth::user()->username)}}"></a>
                    <h2><a href="/logout"><strong>LOGOUT</strong></a></h2>
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
                            <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="img/profilepic.jpeg" alt="profile picture">
                            <a class="post-Username" href="">RobertoSaviano14</a>
                            <a class="post-clubTag rounded-full bg-black p-1 px-2 bg-opacity-40 hover:bg-white hover:bg-opacity-20" href="">U-Club</a>
                            <a class="rounded-full bg-black p-1 px-2 bg-opacity-40 hover:bg-white hover:bg-opacity-20" href="">NOME EVENTO</a>
                        </div>
                        
                    </div>
                    <div class="relative overflow-hidden" id="carousel-container">
                        <div class="absolute overflow-hidden" id="carousel">
                        <img src="img/shrek.jpg" class="w-64 h-auto object-scale-down">
                        <img src="img/Shrek-E-Vissero-Felici-E-Contenti-Poster-Locandina.webp" class="w-64 h-auto object-scale-down">
                        <img src="img/banner.png" class="w-64 h-auto object-scale-down">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 my-2">
                        <button id="prev-button" class="hover:bg-opacity-20 hover:bg-white rounded-l-lg"><i class="uil uil-arrow-left"></i></button>
                        <button id="next-button" class="hover:bg-opacity-20 hover:bg-white rounded-r-lg"><i class="uil uil-arrow-right"></i></button>
                    </div>
                </div>

                <div class="comments-container rounded-xl bg-black bg-opacity-40 backdrop-blur p-2 mt-2">
                    <h1 class="text-xl">comments</h1>
                    <!--COMMENT TEMPLATE-->
                    <div class="comment-layout flex p-2 gap-2 m-2">
                        <img class="post-profilePicture object-fill h-14 w-14  rounded-full" src="img/profilepic.jpeg" alt="profile picture">
                        <div>
                            <a class="post-Username font-bold" href="">RobertoSaviano14</a>
                            <p>Song come canzone</p>
                        </div>
                    </div>
                    <div class="comment-layout flex p-2 gap-2 m-2">
                        <img class="post-profilePicture object-fill h-14 w-14  rounded-full" src="img/shrek.jpg" alt="profile picture">
                        <div>
                            <a class="post-Username font-bold" href="">SalvatoreAranzulla_VEVO</a>
                            <p>Bella foto!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="comment-button ml-2 mt-2 sticky-right fixed w-full md:w-full lg:w-[32%] text-center">
                    <div class="p-2 mb-2 rounded-xl bg-black bg-opacity-50 backdrop-blur shadow-2xl hover:bg-white hover:bg-opacity-20">
                        <a href="">Send</a>
                    </div>
                    <div>
                        <div class="flex items-center justify-center w-full">
                            <label for="caption" name="captionLabel" class="w-full bg-black bg-opacity-40 backdrop-blur rounded-xl">
                            <div class="flex justify-between p-2">
                                <p class="inline text-right" id="charCounter">150</p>
                            </div>
                            <textarea id="caption" name="caption" maxlength="150" class="bg-black bg-opacity-40 w-full rounded-xl"></textarea>
                        </div>
                    </div>
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
            carouselContainer.style.height = "400px";
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
    </body>
</html>