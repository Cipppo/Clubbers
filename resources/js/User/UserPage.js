import $ from 'jquery';





$(() => {


    let viewMode = 1;
    let postButton = $("#postButton");
    let eventButton = $('#eventButton');
    let container = $("#container");



    function addPostToContainer(postIn){
        console.log(postIn);
        postIn[0].forEach(post => {
            container.append(`
                <div class="w-21 items-center text-slate-200 py-2">
                    <div class="post-User rounded-xl bg-black bg-opacity-50 backdrop-blur">
                        <div class ="post-banner rounded-t-lg object-fill">
                            <a href="/post/show/${post.postId}"><img class ="rounded-t-lg " src="/${post.bannerUrl}" alt="Event Banner"></a>
                        </div>
                            <div class="post-Profile flex items-center gap-2 p-2">
                            <img class="post-profilePicture object-fill h-20 w-20  rounded-full" src="/${post.proPicUrl}" alt="userProPic">
                            <a class="post-Username" href="/user/show/${userId}">${post.clubberUsername}</a>
                            <div class="post-clubTag rounded-full bg-black p-0.5 px-1 opacity-30">${post.clubUsername}</div>
                        </div>
                        <div class="post-info p-2">
                            <p class="post-caption">${post.caption}</p>
                        </div>
                    </div>
                </div> 
            `)
        });

    };

    function addEventToContainer(eventIn){
        console.log(eventIn[0]);
        eventIn[0].forEach(evento =>{
            container.append(`
                <a href="/event/show/${evento.eventId}">
                <div class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-103  duration-300">
                    <div class="events-bg-img bg-cover w-full h-24 rounded-xl" style="background-image: url(/${evento.URL})">
                        <div class="hover:bg-black hover:bg-opacity-20 hover:backdrop-blur-sm rounded-xl hover:delay-200">
                            <div class="event-real rounded-xl h-24 bg-black bg-opacity-60 p-3 items-center">
                                <div class="text-center flex justify-center"></div>
                                <div class="justify-center flex gap-2 w-full">
                                    <p class="mt-2 text-2xl">${evento.nomeEvento}</p>
                                </div>
                                <div class="flex justify-between w-full px-7 pt-3">
                                    <p class="invisible xl:visible">${evento.shortDescription}</p>
                                    <p>${evento.Date}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            `)
        });
    };

    function retrieveUserPosts(id){
        selectPost();
        $.get(`/user/post/${id}`)
        .then(response =>{
            let responseA = Array(response[0]);
                console.log("MANDATO");
                addPostToContainer(responseA);
        })
    };

    function retrieveUserEvents(id){
        selectEvents();
        $.get(`/user/events/terminated/${id}`)
        .then(response =>{
            let responseA = Array(response);
            addEventToContainer(responseA);
        })
    };

    function clearContainer(){
        container.html("");
    }

    function selectPost(){
        postButton.attr('class', 'profile-post bg-white bg-opacity-40 hover:bg-opacity-10 hover:rounded-bl-xl p-3 border-t border-slate-300 border-opacity-40"');
        eventButton.attr('class', 'profile-post hover:bg-white hover:bg-opacity-10 hover:rounded-bl-xl p-3 border-t border-slate-300 border-opacity-40');
    }

    function selectEvents(){
        eventButton.attr('class', 'class="profile-post bg-white bg-opacity-40 hover:bg-opacity-10 hover:rounded-bl-xl p-3 border-t border-slate-300 border-opacity-40"');
        postButton.attr('class', 'profile-post hover:bg-white hover:bg-opacity-10 hover:rounded-bl-xl p-3 border-t border-slate-300 border-opacity-40');
    }




    function update(){
        switch(viewMode){
            case 1:
                clearContainer();
                retrieveUserPosts(userId);
                break;
                case 2:
                clearContainer();    
                retrieveUserEvents(userId);
                break;

        }
    }

    let userId = window.location.href.split("/")[window.location.href.split("/").length - 1];
    let username = $('#Username').html();
    

    postButton.on('click', function(e){
        viewMode = 1;
        update();
    });

    eventButton.on('click', function(e){
        viewMode = 2;
        update();
    })

    retrieveUserPosts(userId);

})