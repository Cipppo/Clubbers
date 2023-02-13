import $ from 'jquery';


const bg_clicked = 'rgb(157, 193, 250)';


function update(postId){
    $.get(`/post/react/${postId}`)
    .then(response =>{
        $(`#likeNumber${postId}`).html(response.likes)
        if(response.userLike == true){
            $(`#likeIcon${postId}`).css('color', 'red');
        }else{
            $(`#likeIcon${postId}`).css('color', 'white');
        }
    })
}

function updateLike(postId){
    let a = $.post('/post/react/like', {'post_id':postId});
    console.log(postId);
    console.log(a);
    update(postId);
}




$(()=>{

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    const buttons = Array.from($("button[id^=like-button]"));
    console.log(buttons);

    buttons.forEach((button)=>{
        button.addEventListener('click', function(evt){
            updateLike(button.name);
        })
        update(button.name)
    })
    
    
})