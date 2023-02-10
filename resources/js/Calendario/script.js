import $ from 'jquery';


const isLeapYear = (year) => {
    return (
        (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
        (year % 100 === 0 && year % 400 === 0)
    );
};
const getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28;
};
let calendar = document.querySelector(".calendar");
const month_names = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];
let month_picker = document.querySelector("#month-picker");
let idDataPrecedente;
month_picker.onclick = () => {
    month_list.classList.remove("hideonce");
    month_list.classList.remove("hide");
    month_list.classList.add("show");
};

const generateCalendar = (month, year) => {
    let calendar_days = document.querySelector(".calendar-days");
    calendar_days.innerHTML = "";
    let calendar_header_year = document.querySelector("#year");
    let days_of_month = [
        31,
        getFebDays(year),
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
    ];

    let currentDate = new Date();

    month_picker.innerHTML = month_names[month];

    calendar_header_year.innerHTML = year;

    let first_day = new Date(year, month);

    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
        let day = document.createElement("div");

        if (i >= first_day.getDay()) {
            let giorno = i - first_day.getDay() + 1;
            day.innerHTML = giorno;

            let monthGiven = parseInt(month + 1);
            if(monthGiven < 10){
                monthGiven = "" + 0 + monthGiven;
            }
            let data = "" + giorno + '-' + monthGiven + '-' + year;
            isEventPresent(data, day);
            // console.log("" + data + "evento");
            // day.classList.add(
            //     "dayss", 
            //     'bg-opacity-40', 
            // );
        
            // day.classList.add(
            //     "dayss",
            //     "bg-opacity-40",
            //     "hover:bg-opacity-40",
            //     "hover:bg-white"
            // );
        
            day.id = `${giorno}`;
            if (
                i - first_day.getDay() + 1 === currentDate.getDate() &&
                year === currentDate.getFullYear() &&
                month === currentDate.getMonth()
            ) {
                day.classList.add("current-date");
                day.id = "daycurrent";
            }
        }
        // funzione che restituisce il giorno
        day.addEventListener("click", () => {
            let giorno = i - first_day.getDay() + 1;
            let data = new Date(year, month, giorno);
            // console.log(year);
            // console.log(month);
            const dayss = document.querySelectorAll(".dayss");

            for (const day1 of dayss) {
                if (day1.id == idDataPrecedente) {
                    day1.classList.remove(
                        "clicked-day",
                        "bg-white",
                        "bg-opacity-20",
                        "rounded-lg"
                    );
                }
            }
            for (const day1 of dayss) {
                if (day1.id == giorno.toString()) {
                    day1.classList.add(
                        "clicked-day",
                        "bg-white",
                        "bg-opacity-20",
                        "rounded-lg"
                    );
                    idDataPrecedente = day1.id;
                    let monthGiven = parseInt(month + 1);
                    if(monthGiven < 10){
                        monthGiven = "" + 0 + monthGiven;
                    }
                    showEventsInDate("" + idDataPrecedente + '-' + monthGiven + '-' + year);
                }
            }

            // console.log(data);
        });
        calendar_days.appendChild(day);
    }
};

let month_list = calendar.querySelector(".month-list");
month_names.forEach((e, index) => {
    let month = document.createElement("div");
    month.innerHTML = `<div>${e}</div>`;

    month_list.append(month);
    month.onclick = () => {
        currentMonth.value = index;
        generateCalendar(currentMonth.value, currentYear.value);
        month_list.classList.replace("show", "hide");
    };
});

(function () {
    month_list.classList.add("hideonce");
})();

function addEventOnEventList(name, id){
    $.get(`/images/banners/${id}`).then(response =>{
        let container = $("#calendarEventContainer");
        let a = ($('<a href="#">'));
        let div1 = ($('<div class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-103  duration-300">'));
        let div2 = $(`<div class="events-bg-img bg-cover w-full h-24 rounded-xl" style="background-image: url(${response})">`);
        let div3 = $('<div class="hover:bg-black hover:bg-opacity-20 hover:backdrop-blur-sm rounded-xl hover:delay-200">');
        let div4 = $('<div class="event-real rounded-xl h-24 bg-black bg-opacity-60 p-3 items-center">');
        let div5 = $('<div class="justify-center flex gap-2 w-full">');
        let p = $(`<p class="mt-2 text-2xl">${name}</p>`);
        div5.append(p);
        div4.append(div5);
        div3.append(div4);
        div2.append(div3);
        div1.append(div2);
        a.append(div1);
        container.append(a);
    })


}

function showEventsInDate(date){
    console.log(date);
    $("#calendarEventContainer").html("");
    $.get(`calendar/date/${date}`).then(response => {
        if(response.length > 0){
            response.forEach(element=> {
                console.log(element.name);
                console.log(element.id);
                addEventOnEventList(element.name, element.id);
            })
        }else{
            $("#calendarEventContainer").html("Non ci sono eventi");
        }
    });
}

function isEventPresent(date, day){
    $.get(`calendar/date/event/${date}`).then(
        response => {
            if(response == 1){
                day.classList.add(
                    "dayss", 
                    'bg-opacity-40', 
                    'isEvent',
                    "hover:bg-opacity-40",
                    "hover:bg-white",
                );
            }else{
                day.classList.add(
                    "dayss",
                    "bg-opacity-40",
                    "hover:bg-opacity-40",
                    "hover:bg-white"
                );  
            }
        }
    )
}


document.querySelector("#pre-year").onclick = () => {
    --currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};
document.querySelector("#next-year").onclick = () => {
    ++currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};

let currentDate = new Date();
let currentMonth = { value: currentDate.getMonth() };
let currentYear = { value: currentDate.getFullYear() };
generateCalendar(currentMonth.value, currentYear.value);
