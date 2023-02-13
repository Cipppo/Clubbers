import $ from 'jquery';





$(() => {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let viewMode = 1;
    let postButton = $("#postButton");
    let eventButton = $('#eventButton');
    let container = $("#container");
    let followButton = $("#followButton");
    let followCounter = $('#followCounter');
    let followersCounter = $("#FollowersCounter");

    let followstatus = 0;


    let userId = window.location.href.split("/")[window.location.href.split("/").length - 1];
    let username = $('#Username').html();
    

    function setButtonToFollow(){
        followButton.attr('class', 'm-4 p-2 bg-blue-500 rounded-xl my-2 font-semibold hover:bg-blue-700 hover:text-slate-300 shadow-lg');
        followButton.html('Follow');
    }

    function setButtonToUnfollow(){
        followButton.attr('class', 'm-4 p-2 bg-blue-500 rounded-xl my-2 font-semibold hover:bg-blue-700 hover:text-slate-300 shadow-lg');
        followButton.html("Unfollow");
    }


    function handleButton(){
        if(followstatus == 0){
            setButtonToFollow();
            followstatus = 1;
        }else{
            setButtonToUnfollow();
            followstatus = 0;
        }
    }

    function setupButton(){
        $.get(`/user/following/${userId}`)
        .then(response=>{
            followstatus = response;
            handleButton();
        })
    }


    followButton.on('click', function(e){

        if(followstatus == 1){
            $.post(`/user/follow/${userId}`).then(response =>{
                console.log(response);
            });
        }else{
            $.post(`/user/unfollow/${userId}`).then(response => {
                console.log(response);
            });
        }

        handleButton();
        updateStats();

    })

    function updateStats(){
        refreshFollowed();
        refreshFollowers();
    }

    function refreshFollowed(){
        $.get(`/user/countFollowing/${userId}`).then( response =>{
            followCounter.html(response);
        });
    }

    function refreshFollowers(){
        $.get(`/user/countFollowers/${userId}`).then( response =>{
            followersCounter.html(response);
        });
    }


    setupButton();
    updateStats();

    function addPostToContainer(postIn){
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