<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <title>Clubbers</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @vite(['../resources/css/userPost.css', '../resources/js/Post/postCreate.js',  '../resources/js/app.js'])
    </head>
    
 <body class="bg-fixed object-fill" style="background-image: url(../images/feed/background2.jpg)">

    <!--NAVBAR-->
    <nav class="z-10 items-center w-full sticky-top fixed px-10 py-5 bg-black backdrop-blur bg-opacity-40 text-slate-200 shadow-xl">
            <div class="flex items-center justify-between">
                <div class="navbar-logo items-center flex gap-2">
                    <img class="h-12 w-12 shadow-xl" src="../images/feed/ClubbersLogo.png" alt="Clubbers">
                    <h1 class="invisible md:visible lg:visible">Clubbers</h1>
                </div>
                <div class="navbar-search-bar flex gap-4 p-2 bg-black backdrop-blur bg-opacity-40 rounded-2xl">
                    <button><i class="uil uil-search p-3 rounded-full hover:bg-white hover:bg-opacity-20"></i></button>
                    <input type="search" class="bg-black lg:px-20 py-2 rounded-full placeholder:text-center shadow-2xl" placeholder="connect with people...">
                </div>
                <div class="navbar-options items-center md:flex lg:flex lg:gap-4 gap-2">
                    <a href=""><img src="" class="bg-black bg-opacity-30 px-3 py-1 rounded-full hover:bg-opacity-20 hover:bg-white" alt="notification"></a>
                    <h1 class="invisible lg:visible">{{ Auth::user()->username}}</h1>
                    <a href=""><img src="" class="rounded-full h-12 w-12 shadow-xl" alt="profile-picture"></a>
                    <h1><a href="/logout"><strong>LOGOUT</strong></a></h1>
                </div>
            </div>            
    </nav>


    <div class="py-36 md:py-36 lg:py-24 lg:grid grid-cols-3 justify-between text-slate-200">
        <div></div>
        <div class="p-2 grid grid-cols-1 gap-2">
            <div class="rounded-lg shadow-xl bg-black backdrop-blur bg-opacity-40 p-3 text-center">
                <h1>UPLOAD POST</h1>
            </div>
            <div class="rounded-lg shadow-xl bg-black backdrop-blur bg-opacity-40 items-center justify-between flex p-3 gap-5">
                <p>Wich event did you go?</p>

                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                        <select id='selectEvent'class="form-select appearance-none block w-full px-3 py-2 text-base font-normal text-slate-200 bg-black bg-clip-padding bg-no-repeat bg-opacity-40 border-l-neutral-500 rounded-xl transition ease-in-out m-0 hover:bg-white hover:bg-opacity-20 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <option value='0' selected>Select the event</option>
                            <option value="1">UCLUB</option>
                            <option value="2">NONSO</option>
                            <option value="3">CAZZISPORCHI</option>
                        </select>
                    </div>
                </div>
            </div>
                <div id="part-two">
                    <div id="partTwo2">
                    <div class="rounded-lg shadow-xl bg-black backdrop-blur bg-opacity-40 p-10 text-center">
                        <div class="flex items-center justify-center w-full">
                            
                            <label for="dropzoneFile" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-black bg-opacity-40 hover:bg-white hover:bg-opacity-20 p-2">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">(MAX: 1920x1080px)</p>
                                </div>
                                <input id="dropzoneFile" type="file" class="hidden" multiple/>
                            </label>
                        </div> 
                    
                    </div>
                    </div>
                </div>
                <div id="previewZone" class="rounded-lg shadow-xl bg-black backdrop-blur bg-opacity-40 p-10 text-center"></div>
                <div id="part-three">
                    <div class="rounded-lg shadow-xl bg-black backdrop-blur bg-opacity-40 p-10 text-center">
                        <h2 class="pb-2">Caption</h2>
                        <div class="py-2">
                            <input type="text" class = "bg-black bg-opacity-40 w-full rounded-xl py-6 px-3">
                        </div>
                    </div>
                    <div class="w-full rounded-lg shadow-xl bg-black backdrop-blur bg-opacity-40 p-3 text-center hover:bg-white hover:bg-opacity-20 mt-2">
                        <button onclick="">CREATE POST</button>
                    </div>
                </div>
        </div>
        
        <div></div>
    </div>
    
</body>

</html>


