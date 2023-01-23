<!DOCTYPE html>
<html lang="it">
    <head>
        <title>LogIn</title>
        @vite('../resources/css/app.css')
    </head>
    <body>
        <div class="relative min-h-screen flex bg-stone-100">
            <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
              <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative Back">
                <div class="absolute bg-gradient-to-b from-blue-900 to-gray-900 opacity-75 inset-0 z-0"></div>
        <div class="absolute triangle min-h-screen right-0 w-16" style=""></div>
                <div class="w-full  max-w-md z-10">
                  <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Join the Revolution</div>
                  <div class="sm:text-sm xl:text-md text-gray-200 font-normal"> What is Lorem Ipsum Lorem Ipsum is simply dummy
                    text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever
                    since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it
                    has?</div>
                </div>
                <!---remove custom style-->
               <ul class="circles">
              <li>dio</li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
           </ul>
              </div>
              <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-2/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-stone-100 ">
                <div class="max-w-md w-full space-y-8">
                  <div class="text-center">
                    <h2 class="mt-6 text-3xl font-bold text-gray-900">
                      Welcome Back!
                    </h2>
                    <p class="mt-2 text-sm text-gray-500">Insert your credentials to enter!</p>
                  </div>
                  <form class="mt-8 space-y-6" method="POST" action="/authenticate" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-8 content-center">
                        <label for="username" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Username</label>
                        <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Username" id="username" name="username">
                    </div>
                    <div class="mt-8 content-center">
                        <label for="password" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Password</label>
                        <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="password" placeholder="Password" id="password" name="password">
                    </div>
                    <div>
                      <button type="submit" class="w-full flex justify-center bg-gradient-to-r from-indigo-500 to-blue-600  hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                        Log In !
                      </button>
                    </div>
                    </p>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </body>
</html>