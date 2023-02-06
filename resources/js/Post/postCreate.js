import $ from "jquery";





$(()=>{

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const two = $("#part-two").css('display', 'none');
    const three = $("#part-three").css('display', 'none');
    const fileIn = $('#dropzoneFile');
    console.log($('#selectEvent').val());

    $('#selectEvent').on('change', function(e){
        const val = ($('#selectEvent').val());
        if(val != 0){
            two.css('display', 'block');
        }
    });

    // Improve
    fileIn.on('change', function(e){
        file = fileIn.files[1];
        console.log(file);
    });

})  