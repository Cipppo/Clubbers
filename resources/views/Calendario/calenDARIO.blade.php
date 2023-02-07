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
    <body class="bg-fixed object-fill">
        <!-- inizio del calendario -->
        <div class="contianer">
            <div class="calendar">
                <div class="calendar-header">
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
