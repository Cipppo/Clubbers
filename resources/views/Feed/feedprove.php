<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="post.css">
    <title>Clubbers</title>
</head>
<body class="Back">
    <header class="">
        <!--NAVBAR-->
        <nav class="z-10 w-full sticky-top fixed items-center px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <img class="h-12 w-12 shadow-xl" src="img/ClubbersLogo.png" alt="Clubbers">
                    <h1 class="invisible md:visible lg:visible">Clubbers</h1>
                </div>
                <div class="navbar-search-bar flex gap-2">
                    <input type="search" placeholder="connect with people...">
                    <i class="uil uil-search"></i>
                </div>
                <div class="navbar-options items-center md:flex lg:flex gap-2">
                    <a href=""><img src="" class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white" alt="notification"></a>
                    <a href=""><img src="img/shrek.jpg" class="rounded-full h-12 w-12 shadow-xl" alt="profile-picture"></a>
                </div>
            </div>            
        </nav>

    </header>
    <div class="py-[5%] lg:grid grid-cols-3 justify-between text-slate-200" >
        <div class="left z-10 w-full sticky-top">

        </div>

        <div class="feed px-3">

            <div class="w-21 items-center text-slate-200 py-2">
                <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                    <div class ="post-banner rounded-t-lg object-fill">
                        <img class ="rounded-t-lg " src="img/Banner1.jpg" alt="banner">
                   </div>
                    <div class="post-Profile flex items-center gap-2 p-2">
                        <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="img/profilepic.jpeg" alt="profile picture">
                        <a class="post-Username" href="">RobertoSaviano14</a>
                        <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href="">U-Club</a>
                    </div>
                    
                        <div class="post-info p-2">
                            <p class="post-caption">questo è un post molto lungo ceh se scrivi una descrizione cosi lunga sei uno stronzo</p>
                        </div>
                        <div class="post-buttons flex p-2">
                            <!-- <div class="p-1"><a href=""><img class="h-5 w-5" src="img/like-not-pressed.png" alt="like"></a></div> -->

                            <i class="uil uil-heart text-size-10" alt="like"></i>
                        </div>
                    
                </div>
            </div>


            <!-- <div class="w-21 items-center text-slate-200 py-2">
                <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                    <div class ="post-banner rounded-t-lg object-fill">
                        <img class ="rounded-t-lg object-fill" src="img/Banner1.jpg" alt="banner">
                   </div>
                    <div class="post-Profile flex items-center gap-2 p-2">
                        <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="img/shrek.jpg" alt="profile picture">
                        <a class="post-Username" href="">StefanoCucchi_REAL</a>
                        <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href="">U-Club</a>
                    </div>
                    
                        <div class="post-info p-2">
                            <p class="post-caption">questo è un post molto lungo ceh se scrivi una descrizione cosi lunga sei uno stronzo</p>
                        </div>
                        <div class="post-buttons flex p-2">
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/like-not-pressed.png" alt="like"></a></div>
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/comment.png" alt="comment"></a></div>
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/tagged-people.png" alt="tagged people"></a></div>
                        </div><div class="w-21 items-center text-slate-200 py-2">
                <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                    <div class ="post-banner rounded-t-lg object-fill">
                        <img class ="rounded-t-lg object-fill" src="img/Banner1.jpg" alt="banner">
                   </div>
                    <div class="post-Profile flex items-center gap-2 p-2">
                        <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="img/shrek.jpg" alt="profile picture">
                        <a class="post-Username" href="">StefanoCucchi_REAL</a>
                        <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href="">U-Club</a>
                    </div>
                    
                        <div class="post-info p-2">
                            <p class="post-caption">questo è un post molto lungo ceh se scrivi una descrizione cosi lunga sei uno stronzo</p>
                        </div>
                        <div class="post-buttons flex p-2">
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/like-not-pressed.png" alt="like"></a></div>
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/comment.png" alt="comment"></a></div>
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/tagged-people.png" alt="tagged people"></a></div>
                        </div>
                    
                </div>
            </div>

            <div class="w-21 items-center text-slate-200 py-2">
                <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                    <div class ="post-banner rounded-t-lg object-fill">
                        <img class ="rounded-t-lg " src="img/banner.png" alt="banner">
                   </div>
                    <div class="post-Profile flex items-center gap-2 p-2">
                        <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="img/profilepic.jpeg" alt="profile picture">
                        <a class="post-Username" href="">RobertoSaviano14</a>
                        <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href="">U-Club</a>
                    </div>
                    
                        <div class="post-info p-2">
                            <p class="post-caption">questo è un post molto lungo ceh se scrivi una descrizione cosi lunga sei uno stronzo</p>
                        </div>
                        <div class="post-buttons flex p-2">
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/like-not-pressed.png" alt="like"></a></div>
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/comment.png" alt="comment"></a></div>
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/tagged-people.png" alt="tagged people"></a></div>
                        </div>
                    
                </div>
            </div>
            
                    
                </div>
            </div>

            <div class="w-21 items-center text-slate-200 py-2">
                <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                    <div class ="post-banner rounded-t-lg object-fill">
                        <img class ="rounded-t-lg " src="img/banner.png" alt="banner">
                   </div>
                    <div class="post-Profile flex items-center gap-2 p-2">
                        <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="img/profilepic.jpeg" alt="profile picture">
                        <a class="post-Username" href="">RobertoSaviano14</a>
                        <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href="">U-Club</a>
                    </div>
                    
                        <div class="post-info p-2">
                            <p class="post-caption">questo è un post molto lungo ceh se scrivi una descrizione cosi lunga sei uno stronzo</p>
                        </div>
                        <div class="post-buttons flex p-2">
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/like-not-pressed.png" alt="like"></a></div>
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/comment.png" alt="comment"></a></div>
                            <div class="p-1"><a href=""><img class="h-5 w-5" src="img/tagged-people.png" alt="tagged people"></a></div>
                        </div>
                    
                </div>
            </div>
             -->
        </div>

        <div class="content-start text-slate-200">
            <div class="post-button px-3 py-2">
                <button class="w-full rounded-xl bg-black p-5 bg-opacity-40 backdrop-blur">Make a post</button>
            </div>
            <div class="upcoming-events px-3 py-1 ">
                <div class="w-full rounded-xl bg-black p-5 bg-opacity-40 items-center backdrop-blur">
                    <div class="title text-center bg-black bg-opacity-30 p-3 rounded-xl shadow-xl"> <h1>UPCOMING EVENTS!</h1></div>

                    <div class="post1 text-center bg-black bg-opacity-30 p-3 rounded-xl shadow-xl ">
                        <a href=""> titolo</a>
                        <p>odio le persone allegre</p>
                    </div>
                </div>

                
            </div>
        </div>

    </div>




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

</body>
</html>