import $ from 'jquery'




$(()=>{


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

function detectPartecipation(id){
    $.get(`/events/isPartecipating/${id}`)
    .then(response =>{
        if(response == 1){
            console.log("part");
            button.html("You are already partecipating !")
            button.attr('name', 'Partecipating');
            setNonPartecipationStyle();
        }else{
            console.log("non part");
            button.html("Partecipate !")
            button.attr('name', 'notPartecipating');
            setPartecipationStyle();
        }
    })
}

function setPartecipationStyle(){
    button.attr('class', 'p-2 bg-green-500 rounded-xl my-2 font-semibold hover:bg-green-700 hover:text-slate-300 shadow-lg');
    button.html("Partecipate !")
    button.attr('name', 'notPartecipating');
}

function setNonPartecipationStyle(){
    button.attr("class", 'p-2 bg-blue-500 rounded-xl my-2 font-semibold hover:bg-blue-700 hover:text-slate-300 shadow-lg');
    button.html("You are already partecipating !")
    button.attr('name', 'Partecipating');
}

function setPartecipation(){
    console.log("NOW PARTECIPATING");
    setNonPartecipationStyle();
}

function unsetPartecipation(){
    console.log("NO MORE PARTECIPATING");
    setPartecipationStyle();
}

$("#endEvent").on('click', function(e){
    let a = $.post(`/event/end/${eventId}`);
    console.log(a);
    window.location.reload()
})


let eventId = window.location.href.split("/")[window.location.href.split("/").length - 1];
let button = $("#partecipateButton");
console.log(eventId);
detectPartecipation(eventId);


button.on('click', function(e){
    if(button.attr('name') == "Partecipating"){
        $.post(`/event/removePartecipation/${eventId}`);
        unsetPartecipation();
    }else{
        $.post(`/event/partecipate/${eventId}`);
        setPartecipation();
    }
})

button.hover(
    function() {
      if(button.attr('name') == "Partecipating"){
        button.html("Remove partecipation");
        button.attr('class', 'p-2 bg-red-500 rounded-xl my-2 font-semibold hover:bg-red-700 hover:text-slate-300 shadow-lg')
      }
    }, function() {
      if(button.attr('name') == "Partecipating"){
        button.html("You are already partecipating !")
        button.attr('class', 'p-2 bg-blue-500 rounded-xl my-2 font-semibold hover:bg-blue-700 hover:text-slate-300 shadow-lg');
      }
    }
  );




});