
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    @vite(['../resources/css/userPost.css'])
</head>
<body>
    <div class="w-21 items-center text-slate-200 py-2">
        <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
            <div class ="post-banner rounded-t-lg">
                <img class ="rounded-t-lg " src="?????" alt="banner">
            </div>
            <div class="post-Profile flex items-center gap-2 p-2">
                <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="?????" alt="profile picture">
                <a class="post-Username" href="">?????</a>
                <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href="">?????</a>
            </div>
            <div class="post-info p-2">
                <p class="post-caption">?????</p>
            </div>
            <div class="post-buttons flex gap-2 pb-5">
                <a href=""><img class="h-5 w-5" src="img/like-not-pressed.png" alt="like"></a>
                <a href=""><img class="h-5 w-5" src="img/comment.png" alt="comment"></a>
                <a href=""><img class="h-5 w-5" src="img/tagged-people.png" alt="tagged people"></a>
            </div>
        </div>


              <!-- POST CLUB -->
    <div class="w-21 items-center text-slate-200 py-2">
        <div class="post-club rounded-xl bg-black bg-opacity-50 backdrop-blur">
            <div class ="post-banner-club rounded-t-lg object-fill">
                <img class ="rounded-t-lg " src="img/Locandina11.png" alt="{{App\Http\Controllers\ImageController::getBannerAlt($post->eventId)}}">
            </div>
            <div class="post-Profile-club  flex items-center gap-2 p-2">
                <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="img/shrek.jpg" alt="{{App\Http\Controllers\ImageController::getProPicAlt($post->clubberUsername)}}">
                <a class="post-Username" href="">U-CLUB</a>
                <a class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30" href="">U-CLUB</a>
            </div>
                
            <div class="post-info-club  p-2">
                <p class="post-caption-club">solo belle parole:)</p>
            </div>

            <div class="post-buttons-club flex gap-2 p-2">
                <div class="likes-interaction items-center gap-1 flex"> 
                    <p id="likeNumber{{$post->id}}">0</p>
                    <button id="like-button{{$post->id}}" name="{{$post->id}}"><i class="uil uil-heart" id="likeIcon{{$post->id}}"></i></button>
                </div>
                <button><i class="uil uil-share" ></i></button>
            </div>
        </div>
    </div>
    </div>
</body>
</html>



