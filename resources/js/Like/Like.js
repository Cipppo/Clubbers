import $ from 'jquery';



function handleclick(id){
    console.log(id);
}

function updateLike(){
    var a = $.post('/post/react/like', {'post_id':2});
    console.log(a);
}




$(()=>{

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const buttons = Array.from($("button[id^=like-button]"));
    const prova = $("button[id^=prova]");
    console.log(buttons);

    buttons.forEach((button)=>{
        button.addEventListener('click', function(evt){
            handleclick(button.name);
        })
    })

    prova.on('click', function(evt){
        updateLike();
    })
})