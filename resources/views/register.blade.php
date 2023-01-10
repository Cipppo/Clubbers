<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Clubbers-Log In</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="max-w-6xl relative z-10 m-auto px-6 lg:mt-16">
            <div class="grid md:grid-cols-1 lg:grid-cols-1 items-center login-section align-content:center">
                <div class="bg-white bg-opacity-50 rounded-lg p-10 sm:m-auto md:m-auto lg:m-0">
                    <div class="sm:w-full text-center m-auto lg:m-0">
                        <h1 class="text-3xl md:text-4xl font-bold mb-3">Register</h1>
                        <p class="mb-10">Already in? <a class="no-underline tw-blue" href="#">Log In</a></p>
                        <div class="w-full">
                            <form action="" id="login-form">
                                <div>
                                    <label for="email" class="text-left">Email Address</label>
                                    <div class="mt-1 rounded-md">
                                        <input id="email" value type="email" placeholder="Email" name="email" autofocus required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="password" class="block text-sm font-medium leading-8 text-gray-700">Password</label>
                                    <div class="mt-1 rounded-md">
                                        <input id="password" value type="password" placeholder="Password" name="password" autofocus required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    </div>
                                </div>
                                <div class="mt-2 flex flex-col md:flex-row justify-between">
                                    <div class="flex items-center">
                                        <input id="remember-me" type="checkbox" class="form-checkbox h-4 w-4 tw-blue transition duration-150 ease-in-out">
                                        <label for="remember-me" class="ml-2 block text-sm leading-5 text-gray-900">Remember Me</label>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <span class="block w-full rounded-md">
                                        <button type="submit" class="w-full rounded-md bg-blue-500 text-white font-bold py-2 ">Log In</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>