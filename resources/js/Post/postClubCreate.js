import $ from 'jquery';


$(()=>{



    let part1 = $('#part1');
    let part1back = $('#part1');
    let prevZone = $('#previewZone').css('display', 'none');
    let part2 = $('#part2').css('display', 'none');
    let part3 = $('#part3').css('display', 'none');
    let fileIn = $('#dropzoneFile')
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

    //MANCA DA POPOLARE LA SELECT CON GLI EVENTI CHE SONO onGoing E STORARE IL TUTTO DAJE

})