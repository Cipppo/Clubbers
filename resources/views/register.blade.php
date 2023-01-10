<!DOCTYPE html>
<html lang="it">

<head>
    <title>RegistratiPorcodio</title>
    @vite('resources/css/app.css')
</head>


<div class="relative min-h-screen flex ">
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
          <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative" style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80);">
            <div class="absolute bg-gradient-to-b from-blue-900 to-gray-900 opacity-75 inset-0 z-0"></div>
    <div class="absolute triangle  min-h-screen right-0 w-16" style=""></div>
    <a href="https://codepen.io/uidesignhub" target="_blank" title="codepen aji" class="flex absolute top-5 text-center text-gray-100 focus:outline-none"><img src="/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg" alt="aji" class="object-cover mx-auto w-8 h-8 rounded-full w-10 h-10"><p class="text-xl ml-3">aji<strong>mon</strong></p> </a>
    <img src="https://jasper-pimstorage-skullcandy.s3.us-west-1.amazonaws.com/bd2253a9671dac36a95faf821b52e78935050140be1718ce001f6aace45cf25c.png" class="h-96 absolute right-5 mr-5">
            <div class="w-full  max-w-md z-10">
              <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Reference site about Lorem Ipsum..</div>
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
          <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-2/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white ">
            <div class="max-w-md w-full space-y-8">
              <div class="text-center">
                <h2 class="mt-6 text-3xl font-bold text-gray-900">
                  Welcome!
                </h2>
                <p class="mt-2 text-sm text-gray-500">Please register your account</p>
              </div>
              <form class="mt-8 space-y-6" action="#" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="relative">
                  <label for="name" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Name</label>
                  <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Name">
                </div>
                <div class="mt-8 content-center">
                    <label for="surname" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Surname</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Surname">
                </div>
                <div class="mt-8 content-center">
                    <label for="birth" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Date of Birth</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="Date" >
                </div>
                <div class="mt-8 content-center">
                    <label for="email" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Email</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="something@domain.com">
                </div>
                <div class="mt-8 content-center">
                    <label for="phone" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Phone</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Phone">
                </div>
                <div class="mt-8 content-center">
                  <label for="password" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Password</label>
                  <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="password" placeholder="Enter your password">
                </div>
                <div class="mt-8 content-center">
                    <label for="confirm-password" class="ml-3 text-sm font-bold text-gray-700 tracking-wide">Confirm Password</label>
                    <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="password" placeholder="Confirm Password">
                </div>
                <div>
                  <button type="submit" class="w-full flex justify-center bg-gradient-to-r from-indigo-500 to-blue-600  hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
                    Register
                  </button>
                </div>
                <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                  <span>Already in?</span>
                  <a href="#" class="text-indigo-400 hover:text-blue-500 no-underline hover:underline cursor-pointer transition ease-in duration-300">Sign In !</a>
                </p>
              </form>
            </div>
          </div>
        </div>
    </div>
</html>