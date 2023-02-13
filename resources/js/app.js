import './bootstrap';
import $ from 'jquery';






let notificationBell = $("#notificationBell");





function updateBell(){
    $.get('/notification/present').then(
        response => {
            if(response == 0){
                notificationBell.css('color', 'white');
            }else{
                notificationBell.css('color', 'red');
            }
        }
    )
}

updateBell()