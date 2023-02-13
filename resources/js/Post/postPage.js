import $ from "jquery";


$(()=>{


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


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

    function updateComments(caption){
        let div1 = $('<div class="comment-layout flex p-2 gap-2 m-2">');
        let img = $('<img class="post-profilePicture object-fill h-14 w-14  rounded-full" src="{{url(App\Http\Controllers\ImageController::getProPic(Auth::user()->username))}}" alt="User profile Picture">')
        let div2 = $(`<div><a class="post-Username font-bold" href="">{{Auth::user()->username}}</a><p>${caption}</p></div>`);
        img.append(div2);
        div1.append(img);
        $("#commentsContainer").append(div1);
    }

    let commentArea = $("#comment");
    let commentButton = $("#sendComment").css("display", "none");
    let charCounter = $("#charCounter");
    let postId = window.location.href.split("/")[window.location.href.split("/").length - 1];
            
    commentArea.bind('input propertychange', function(){
        charCounter.html(`${this.value.length}/50`)
        if(this.value.length > 0){
            commentButton.css('display', 'block');
        }else{
            commentButton.css("display", "none");
        }
    });

    commentButton.on('click', function(e){
        let request = $.post('/posts/comment/add', {
            "caption":commentArea.val(), 
            "postId":postId,
        });

        document.location.reload();


    });

});