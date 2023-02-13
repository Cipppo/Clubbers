import $ from 'jquery';





$(()=>{


let partOne = $("#partOne");
let partTwo = $("#partTwo").css('display', 'none');
let partThree = $("#partThree").css('display', 'none');
let partFour = $("#partFour").css('display', 'none');
let partFive = $("#partFive").css('display', 'none');
let submit = $("#submitButton").css('display', 'none');
let previewZone = $("#previewZone").css('display', 'none');

let shortDesc = $("#shortDescription");
let counter1 = $('#charCounter1');

let longDesc = $("#longDescription");
let counter2 = $("#charCounter2");


shortDesc.bind('input propertychange', function() {
    counter1.html(`${this.value.length}/50`)
});

longDesc.bind('input propertychange', function(e){
    counter2.html(`${this.value.length}/150`)
});



function displayAll(){
    $("#partTwo").css('display', 'block');
    $("#partThree").css('display', 'block');
    $("#partFour").css('display', 'block');
    $("#partFive").css('display', 'block');
    
}

function hideAll(){
    $("#partTwo").css('display', 'none');
    $("#partThree").css('display', 'none');
    $("#partFour").css('display', 'none');
    $("#partFive").css('display', 'none');
    $("#submitButton").css('display', 'none');
}


$("#eventName").on('input', function(e){
    if(this.value.length > 0){
        displayAll();
    }else{
        hideAll();
    }
});

function createWrapper(id, img){
    let newId = 'imageWrapper' + id;
    let wrapper = $('<div>').attr('id', newId);
    wrapper.append(img);
    wrapper.append($('</div>'));
    return wrapper;
}

$('#fileIn').on('change', function(e){
    $('#dropZone').css('display', 'none');
    $("#submitButton").css('display', 'block');
    $("#previewZone").css('display', 'block');
    var file = this.files[0];
    if(file){
        var reader = new FileReader(file);
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var data = e.target.result,
            img = $('<img />').attr('src', data).fadeIn();
            let id = "UploadedImage";
            img.attr('id', id);
            let wrapper = createWrapper(id, img);
            $('#previewZone').append(wrapper);
        }
    }


});


});