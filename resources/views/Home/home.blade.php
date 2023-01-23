<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['../resources/css/home.css'])
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </head>
    
    <body class="Back h-screen text-white">
        <header class="bg-black bg-opacity-70">
            <nav class="flex justify-between items-center w-[92%]  mx-auto">
                <div>
                    <img class="w-16 cursor-pointer" src="DAFARE" alt="logo clubbers">
                </div>
                <div
                    class="nav-links duration-500 bg-opacity-70 bg-black md:static absolute rounded-lg md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
                    <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                        <li>
                            <a class="hover:text-gray-500" href="#">Home</a>
                        </li>
                        <li>
                            <a class="hover:text-gray-500" href="#">About us</a>
                        </li>
                        <li>
                            <a class="hover:text-gray-500" href="#">work with us</a>
                        </li>
                        <li>
                            <a class="hover:text-gray-500" href="/create-user">Log in</a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-6">
                    <button class="bg-[#1d4185] text-white px-5 py-2 rounded-md hover:bg-[#1e4794]">Sign in</button>
                    <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
                </div>
        </header>
    
    </body>

    <footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-opacity-70 bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-black dark:bg-opacity-70 dark:border-black">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">Clubbers™</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
    </footer>

    
    <script>
            const navLinks = document.querySelector('.nav-links')
            function onToggleMenu(e){
                e.name = e.name === 'menu' ? 'close' : 'menu'
                navLinks.classList.toggle('top-[9%]')
            }
        </script>

</html>


