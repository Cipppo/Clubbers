<!DOCTYPE html>
<html lang="it">

<head>
    <title>RegistratiPorcodio</title>
    @vite('../resources/css/app.css')
</head>


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
                  Welcome!
                </h2>
                <p class="mt-2 text-sm text-gray-500">Please register your account</p>
              </div>
              <form class="mt-8 space-y-6" method="POST" action="/create-user" enctype="multipart/form-data">
                @csrf
                <div class="relative">
                  <label for="name" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="name-tag">What's your Name?</label>
                  <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Name" name="name" id="name">
                </div>
                <div class="mt-8 content-center">
                    <label for="surname" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="surname-tag">And your Surname?</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Surname" id="surname" name="surname">
                </div>
                <div class="mt-8 content-center">
                    <label for="birth" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="birth-tag">When is your birthday ?</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="Date" id="birth" name="birth">
                </div>
                <div class="mt-8 content-center">
                  <label for="City" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="city-tag">Where do you live?</label>
                  <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Rome" name="city" id="city">
                </div>
                <div class="mt-8 content-center">
                    <label for="email" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="mail-tag">Email</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="something@domain.com" name="email" id="email">
                </div>
                <div class="mt-8 content-center">
                    <label for="phone" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="phone-tag">Phone</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Phone" name="phone" id="phone">
                </div>
                <div class="mt-8 content-center">
                  <label for="password" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="password-tag">Password</label>
                  <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="password" placeholder="Enter your password" name="password" id="password">
                </div>
                <div class="mt-8 content-center">
                    <label for="confirm-password" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="confirm-password-tag">Confirm Password</label>
                    <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="password" placeholder="Confirm Password" name="confirm-password" id="confirm-password">
                </div>
                <div>
                  <button type="button" class="w-full flex justify-center bg-gradient-to-r from-indigo-500 to-blue-600  hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500" id="next">Yep! That's me!</button> 
                  <button type="submit" class="w-full flex justify-center bg-gradient-to-r from-indigo-500 to-blue-600  hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500" id="sendall">
                    Register
                  </button>
                </div>
                <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                  <span>Already in?</span>
                  <a href="/logIn" class="text-indigo-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Sign In !</a>
                </p>
              </form>
            </div>
          </div>
        </div>
    </div>

</html>