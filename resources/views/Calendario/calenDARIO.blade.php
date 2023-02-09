<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>calen(dario)</title>
        @vite(['../resources/css/styleCalendario.css',
        '../resources/js/Calendario/script.js', '../resources/js/app.js'])
    </head>
    <body class="bg-fixed object-fill" style="background-image: url(../images/feed/background2.jpg)">
        <!-- inizio del calendario -->
        <div class="contianer flex relative justify-center pt-[2%]">
            <div class="calendar pt-8 px-12 shadow-xl rounded-2xl h-[610px] bg-black bg-opacity-40 backdrop-blur text-slate-200 overflow-hidden">
                <div class="calendar-header p-2 flex justify-between items-center bg-black bg-opacity-20 rounded-2xl font-weight-bold">
                    <span class="month-picker hover:font-bold rounded-lg pt-1 pl-3 cursor-pointer" id="month-picker"> May </span>
                    <div class="year-picker flex items-center" id="year-picker">
                        <span class="year-change" id="pre-year">
                            <span><</span>
                        </span>
                        <span id="year" class="hover:scale-105 hover:font-bold">2020 </span>
                        <span class="year-change" id="next-year">
                            <span>></span>
                        </span>
                    </div>
                </div>

                <div class="calendar-body">
                    <div class="calendar-week-days grid grid-cols-7 cursor-pointer font-bold place-items-center pt-12">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar-days grid grid-cols-7 gap-2"></div>
                </div>
                <div class="calendar-footer p-3 flex justify-end items-center"></div>
                <div
                    class="date-time-formate flex text-center items-center"
                ></div>
                <div class="month-list z-30 position-relative left-0 top-[50px] text-slate-200 bg-white bg-opacity-10 backdrop-blur-3xl grid grid-cols-3 rounded-xl gap-1"></div>
            </div>
        </div>
    </body>
</html>
