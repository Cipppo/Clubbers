import $ from "jquery";





$(()=>{

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function reset(){
        filesRemoved = Array();
        files = Array();
        uploaded = 0;
        fileUploaded = 0;
        mustdisappear.css('display', 'block');
        three.css('display', 'none');
        previewZone.css('display', 'none');
    }

    function del(element){
        files[element.getAttribute('data')] = 0;
        filesRemoved.push(element);
        // console.log(filesRemoved.length);
        // console.log(uploaded);
        if(filesRemoved.length == uploaded){
            reset();
        }
    }

    function add(){
        $('img[id^=uploadedImage]').get().forEach(element => {
            element.addEventListener('click', function(e){
                // console.log("Ao");
                element.style = "display: none";
                del(element);
            })
        });
    }



    const two = $("#part-two").css('display', 'none');
    const three = $("#part-three").css('display', 'none');
    const fileIn = $('#dropzoneFile');
    const previewZone = $('#previewZone').css('display', 'none');
    let files = Array();
    let filesRemoved = Array();
    const mustdisappear = $('#partTwo2');
    let counter = 0;
    let fileUploaded = 0;
    let uploaded = 0;
    let deletionPhrase = "Click to delete";
    // console.log($('#selectEvent').val());


    $('#selectEvent').on('change', function(e){
        const val = ($('#selectEvent').val());
        if(val != 0){
            two.css('display', 'block');
        }else{
            two.css('display', 'none');
            three.css('display', 'none');
        }
    });

    // $('#Submit').on('click', function(e){
    //     console.log(files)   
    //     console.log(filesRemoved)
    // })

    function populateEventInput(){
        $.get('/user/followedEvents')
        .then(response =>{
            let menu = $("#selectEvent");
            for(let i = 0; i < response.length; i++){
                let tmp = $(`<option>${response[i].name}</option>`);
                menu.append(tmp);
            };
        });
    }

    function createWrapper(id, img){
        let newId = 'imageWrapper' + id;
        let wrapper = $('<div>').attr('id', newId);
        wrapper.append(img);
        wrapper.append($('</div>'));
        return wrapper;
    }

    // Improve
    fileIn.on('change', function(e){
        // console.log(this.files.length);
        uploaded = this.files.length;
        fileIn.disabled = true;
        mustdisappear.css('display', 'none');
        three.css('display', 'block');
        previewZone.css('display', 'block');
        for(let i = 0; i < this.files.length; i++){
            var file = this.files[i];
            if(file){
                files.push(file);
                var reader = new FileReader(file);
                reader.readAsDataURL(file);
                reader.onload = function(e){
                    var data = e.target.result,
                    img = $('<img />').attr('src', data).fadeIn();
                    let id = 'UploadedImage' + counter;
                    let up = fileUploaded;
                    img.attr('data', fileUploaded);
                    counter++;
                    fileUploaded++;
                    img.attr('id',id);
                    img.attr('class', 'UpImage');
                    let wrapper = createWrapper(id, img);
                    $('#previewZone').css('display', 'block');
                    $('#previewZone').append(wrapper);
                    $(`#${id}`).on('click', function(e){
                        this.style = "display: none";
                        del(this);
                    })
                }
            }
        }
       
    });

    populateEventInput();

})      