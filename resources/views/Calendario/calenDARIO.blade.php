<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>calen(dario)</title>
        @vite(['../resources/css/styleCalendario.css',
        '../resources/js/Calendario/script.js', '../resources/js/app.js', '../resources/js/Calendario/script2.js'])
    </head>
    <body class="bg-blue-300">
        <!-- inizio del calendario -->
        <div class="contianer flex relative justify-center pt-[2%]">
            <div class="calendar pt-8 px-12 shadow-xl rounded-2xl h-[610px] bg-black bg-opacity-40 backdrop-blur text-slate-200 overflow-hidden">
                <div class="calendar-header p-2 flex justify-between items-center bg-black bg-opacity-20 rounded-2xl font-weight-bold">
                    <span class="month-picker" id="month-picker"> May </span>
                    <div class="year-picker" id="year-picker">
                        <span class="year-change" id="pre-year">
                            <pre><</pre>
                        </span>
                        <span id="year">2020 </span>
                        <span class="year-change" id="next-year">
                            <pre>></pre>
                        </span>
                    </div>
                </div>

                <div class="calendar-body">
                    <div class="calendar-week-days">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="calendar-days"></div>
                </div>
                <div class="calendar-footer"></div>
                <div
                    class="date-time-formate flex text-center items-center"
                ></div>
                <div class="month-list"></div>
            </div>
        </div>
    </body>
</html>
