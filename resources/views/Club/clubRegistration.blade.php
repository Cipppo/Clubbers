<!DOCTYPE html>
<html lang="it">

<head>
    <title>Clubbers-Registration</title>
    @vite(['../resources/css/clubReg.css', '../resources/js/Club/clubRegistration.js'])
</head>


<div class="relative min-h-screen flex bg-stone-100">
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
          <div class="sm:w-1/2 xl:w-2/5 h-full hidden md:flex flex-auto items-center justify-start p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative Back">
            <div class="absolute bg-gradient-to-b from-blue-900 to-gray-900 opacity-75 inset-0 z-0"></div>
    <div class="absolute triangle min-h-screen right-0 w-16" style=""></div>
            <div class="w-full  max-w-md z-10">
              <div class="sm:text-4xl xl:text-5xl font-bold leading-tight mb-6">Join the Revolution</div>
              <div class="sm:text-sm xl:text-md text-gray-200 font-normal"> Clubbers is the first Social network dedicated to people who enjoy the night life All over the World.
                Take a seat and get ready, this is gonna be a long journey !
              </div>
            </div>
            <!---remove custom style-->
           <ul class="circles">
          <li></li>
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
          <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full xl:w-2/5 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-stone-100 ">
            <div class="max-w-md w-full space-y-8">
              <div class="text-center">
                <div id="Part1">
                  <h2 class="mt-6 text-3xl font-bold text-gray-900" id="regTitle">
                    Welcome Club!
                  </h2>
                  <p class="mt-2 text-sm text-gray-500" id="description">Please register your account</p>
                  
                <form class="mt-8 space-y-6" method="POST" action="/create-club" enctype="multipart/form-data">
                  @csrf
                  <div class="relative">
                    <label for="username" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="username-tag">What's your club Name?</label>
                    <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Your club name" name="username" id="username">
                  </div>
                  <div class="mt-8 content-center">
                      <label for="email" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="mail-tag">What's your E-Mail address?</label>
                      <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="something@domain.com" name="email" id="email">
                  </div>
                  <div class="mt-8 content-center">
                      <label for="phone" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="phone-tag">Provide us your phone number</label>
                      <input class="w-full text-base px-4 py-2 border-b border-gray-300 focus:outline-none rounded-2xl focus:border-indigo-500" type="text" placeholder="Phone" name="phone" id="phone">
                  </div>
                  <div class="mt-8 content-center">
                    <div id="proPicPreview"></div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="fileIn" id="FileInputLabel">Upload your Profile avatar!</label>
                    <input class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="fileIn" type="file" accept="image/png, image/jpeg" name="fileIn">
                  </div>
                </div>
                <div id="Part2">
                  <h2 class="mt-6 text-3xl font-bold text-gray-900" id="regTitle">
                    Where is  your Club located at ?
                  </h2>
                  <div class="mt-8 content-center">
                    <label for="state" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="state-tag">State</label>
                    <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="text" placeholder="State" name="state" id="state">
                  </div>
                  <div class="mt-8 content-center">
                    <label for="city" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="city-tag">City</label>
                    <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="text" placeholder="City" name="city" id="city">
                  </div>
                  <div class="mt-8 content-center">
                    <label for="cap" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="cap-tag">CAP</label>
                    <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="text" placeholder="CAP" name="cap" id="cap">
                  </div>
                  <div class="mt-8 content-center">
                    <label for="street" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="street-tag">Street</label>
                    <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="text" placeholder="Street" name="street" id="street">
                  </div>
                </div>
              </div>
                <div id="Part3">
                  <h2 class="mt-6 text-3xl font-bold text-gray-900" id="regTitle">
                    Choose your password
                  </h2>
                  <div class="mt-8 content-center">
                    <label for="password" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="password-tag">Password</label>
                    <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="password" placeholder="Enter your password" name="password" id="password">
                  </div>
                  <div class="mt-8 content-center">
                    <label for="confirm-password" class="ml-3 text-sm font-bold text-gray-700 tracking-wide" id="confirm-password-tag">Confirm Password</label>
                    <input class="w-full content-center text-base px-4 py-2 border-b rounded-2xl border-gray-300 focus:outline-none focus:border-indigo-500" type="password" placeholder="Confirm Password" name="confirm-password" id="confirm-password">
                  </div>
                  <button type="submit" class="mt-8 w-full flex justify-center bg-gradient-to-r from-indigo-500 to-blue-600  hover:bg-gradient-to-l hover:from-blue-500 hover:to-indigo-600 text-gray-100 p-4  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500" id="sendall">
                    Register me Now!
                  </button>
                </div>
                <button type="button" class="mt-8 w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" id="next">Alright let's go on!</button> 
                <div>
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