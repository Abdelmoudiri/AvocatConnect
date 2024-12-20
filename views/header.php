<nav class="flex flex-wrap items-center justify-between p-3 bg-[#e8e8e5]">
        <div class="w-16 h-16"><img src="../src/asset/logo.png" alt="logo de mon site"></div>
        <div class="flex md:hidden">
            <button id="hamburger">
                <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png" width="40" height="40" />
                <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png" width="40" height="40" />
            </button>
        </div>
        <div class="toggle hidden w-full md:w-auto md:flex text-right font-bold mt-5 md:mt-0 md:border-none">
            <a href="index.php#home" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Accueil</a>
            <a href="index.php#avocat" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Avocat</a>
            <a href="index.php#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">À propos</a>
            <a href="index.php#gallery" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Galerie</a>
            <a href="index.php#contactUs" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Contactez-nous</a>
        </div>


        <div class="toggle w-full text-end hidden md:flex md:w-auto px-2 py-2 md:rounded">
            <a href="login.php">
                <div class="flex justify-end">
                    <div class="flex items-center h-10 w-30 rounded-md bg-[#c8a876] text-white font-medium p-2">
                        <img class="w-6 h-6" src="../src/asset/profile.png" alt="profile login image">

                        Connect Now
                    </div>
                </div>
            </a>
        </div>

    </nav>