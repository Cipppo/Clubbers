import $ from 'jquery';


$(()=>{



    let part1 = $('#part1');
    let part1back = $('#part1');
    let prevZone = $('#previewZone').css('display', 'none');
    let part2 = $('#part2').css('display', 'none');
    let part3 = $('#part3').css('display', 'none');
    let caption = $('#caption');
    let maxCaptionLenght = caption.maxlenght;
    let charCounter = $('#charCounter');
    let fileIn = $('#fileIn')
    let selectEvent = $('#selectEvent');
    let submitButton = $('#submitButton').css('display', 'none');

    function updateview(){
        part1.css('display', 'none');
        part2.css('display', 'block');
        part3.css('display', 'block');
        prevZone.css('display', 'block');
    }

    function createWrapper(id, img){
        let newId = 'imageWrapper' + id;
        let wrapper = $('<div>').attr('id', newId);
        wrapper.append(img);
        wrapper.append($('</div>'));
        return wrapper;
    }

    function populateSelect(){
        $.get('/events/current/onGoing')
        .then(response => {
            let menu = $('#selectEvent');
            for(let i = 0; i < response.length; i++){
                let tmp = $(`<option>${response[i].name}</option>`);
                menu.append(tmp);
            }
        })
    }


    fileIn.on('change', function(e){
        updateview()
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

    })

    populateSelect();
    charCounter.html(caption.maxlenght);

    caption.bind('input propertychange', function() {
        charCounter.html(`${this.value.length}/100`)
    });

    selectEvent.on("change", function(e){
        if(this.value != 0){
            submitButton.css('display', 'block');
        }else{
            submitButton.css('display', 'none');
        }
    })

})