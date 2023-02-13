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

function validateDate(date){
    // Date format: YYYY-MM-DD
    var datePattern = /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

    // Check if the date string format is a match
    var matchArray = date.match(datePattern);
    if (matchArray == null) {
        return false;
    }

    // Remove any non digit characters
    var dateString = date.replace(/\D/g, ''); 

    // Parse integer values from the date string
    var year = parseInt(dateString.substr(0, 4));
    var month = parseInt(dateString.substr(4, 2));
    var day = parseInt(dateString.substr(6, 2));
   
    // Define the number of days per month
    var daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    // Leap years
    if (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)) {
        daysInMonth[1] = 29;
    }

    if (month < 1 || month > 12 || day < 1 || day > daysInMonth[month - 1]) {
        return false;
    }
    return true;

}

$('#eventDay').on('input', function(e){
    console.log($("#eventDay").val());
    if(validateDate($("#eventDay").val()) == true){
        $("#partFive").css('display', 'block');
    }else{
        $("#partFive").css('display', 'none');
    }
});

function displayAll(){
    $("#partTwo").css('display', 'block');
    $("#partThree").css('display', 'block');
    $("#partFour").css('display', 'block');
    //PART 5 later
    
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