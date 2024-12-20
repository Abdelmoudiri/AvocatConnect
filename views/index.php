<?php
include 'conn.php';
$sql = "SELECT a.id_avocat,
            u.nom, 
            u.prenom, 
            u.image, 
            a.specialite, 
            YEAR(CURDATE()) - YEAR(a.annee_exp) AS experience, 
            a.bio 
        FROM avocat a 
        JOIN user u ON a.id_user = u.id_user 
        WHERE u.id_role = 2";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Avocats</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F8F9F9]">

    <!-- nav  -->
    <nav class="flex flex-wrap items-center justify-between p-3 bg-[#e8e8e5]">
        <div class="w-16 h-16"><img src="../src/asset/logo.png" alt="logo de mon site"></div>
        <div class="flex md:hidden">
            <button id="hamburger">
                <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png" width="40" height="40" />
                <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png" width="40" height="40" />
            </button>
        </div>
        <div class="toggle hidden w-full md:w-auto md:flex text-right font-bold mt-5 md:mt-0 md:border-none">
            <a href="#home" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Accueil</a>
            <a href="#avocat" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Avocat</a>
            <a href="#aboutus" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">À propos</a>
            <a href="#gallery" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Galerie</a>
            <a href="#contactUs" class="block md:inline-block hover:text-blue-500 px-3 py-3 md:border-none">Contactez-nous</a>
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

    <!-- Hero Section -->
    <div class="relative w-full h-[320px]" id="home">
        <div class="absolute inset-0 opacity-70">
            <img src="../src/asset/bg.jpg" alt="Background Image" class="object-cover object-center w-full h-full" />
        </div>
        <div class="absolute inset-9 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-4 md:mb-0">
                <h1 class="text-blue-700 font-medium text-4xl md:text-5xl leading-tight mb-2">Cabinet d'Avocats</h1>
                <p class="font-regular text-xl mb-8 mt-4">Votre partenaire juridique de confiance</p>
                <a href="#contactUs"
                    class="px-6 py-3 bg-[#c8a876] text-white font-medium rounded-full hover:bg-[#c09858] transition duration-200">
                    Contactez-nous
                </a>
            </div>
        </div>
    </div>


    <!-- our avocat section -->
    <section id="avocat" class="container mx-auto my-8 px-6">
        <h2 class="text-3xl font-bold text-[#2C3E50] text-center mb-8">Rencontrez Nos Avocats</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bg-white shadow rounded-lg p-6'>
                <img src='../uploads/" . htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8') . "' 
                     alt='Photo de l\'avocat' 
                     class='rounded-full mx-auto mb-4 w-32 h-32 border-[#2C3E50] border-4'>
                <h3 class='text-lg font-bold text-center text-[#2C3E50]'>"
                        . htmlspecialchars($row['nom'], ENT_QUOTES, 'UTF-8') . " "
                        . htmlspecialchars($row['prenom'], ENT_QUOTES, 'UTF-8') .
                        "</h3>
                <p class='text-sm text-[#7F8C8D] text-center'>Spécialité : "
                        . htmlspecialchars($row['specialite'], ENT_QUOTES, 'UTF-8') .
                        "</p>
                <p class='text-sm text-[#7F8C8D] text-center'>Expérience : "
                        . htmlspecialchars($row['experience'], ENT_QUOTES, 'UTF-8') . " ans
                </p>
                <p class='text-sm text-[#7F8C8D] text-center'>\""
                        . htmlspecialchars($row['bio'], ENT_QUOTES, 'UTF-8') . "\"
                </p>
                <div class='mt-4 text-center'>
                   <button onclick=\"location.href='avocat_profile.php?id=" . htmlspecialchars($row['id_avocat'], ENT_QUOTES, 'UTF-8') . "'\"
                         class='bg-[#2C3E50] text-white px-4 py-2 rounded-md hover:bg-blue-800'> Voir Profil
                    </button>
                </div>
            </div>";
                }
            } else {
                echo "<p class='text-center'>Aucun avocat trouvé.</p>";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <!-- about us -->
    <section class="bg-gray-100" id="aboutus">
        <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                <div class="max-w-lg">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">À Propos de Nous</h2>
                    <p class="mt-4 text-gray-600 text-lg">
                        Notre cabinet d'avocats est dédié à fournir à nos clients des conseils juridiques de qualité
                        supérieure et un accompagnement personnalisé. Avec une expertise dans divers domaines du droit, nous
                        nous engageons à protéger vos droits et à défendre vos intérêts.
                        <br><br>
                        Nous offrons des services dans les domaines du droit des affaires, du droit pénal, du droit de la
                        famille, et bien plus encore. Notre équipe expérimentée travaille avec professionnalisme, intégrité
                        et compassion pour vous fournir des solutions juridiques adaptées à vos besoins.
                        <br><br>
                        Si vous recherchez des experts juridiques fiables et dévoués, nous sommes là pour vous aider.
                        Contactez-nous dès aujourd'hui pour une consultation personnalisée.
                    </p>
                </div>
                <div class="mt-12 md:mt-0">
                    <img class="object-cover h-full w-full rounded-lg shadow-md" src="https://npr.brightspotcdn.com/dims4/default/bfd3265/2147483647/strip/true/crop/4500x2531+0+0/resize/1760x990!/format/webp/quality/90/?url=https%3A%2F%2Fmedia.npr.org%2Fassets%2Fimg%2F2022%2F07%2F22%2Fbcs_609_gl_1005_0864-rt_wide-c958ce0b1e351340c63e2f5823f499afe3fbf840.jpg" alt="Image à Propos">
                </div>
            </div>
        </div>
    </section>


    <!-- why us  -->
    <section class="text-gray-700 body-font mt-10">
        <div class="flex justify-center text-3xl font-bold text-gray-800 text-center">
            Pourquoi Nous Choisir ?
        </div>
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-wrap text-center justify-center">
                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                        <div class="flex justify-center">
                            <img src="../src/asset/image1.jpg" class="w-32 h-32 object-cover mb-3">
                        </div>
                        <h2 class="title-font font-regular text-2xl text-gray-900">Expertise Juridique</h2>
                    </div>
                </div>

                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                        <div class="flex justify-center">
                            <img src="../src/asset/image2.jpg" class="w-32 h-32 object-cover mb-3">
                        </div>
                        <h2 class="title-font font-regular text-2xl text-gray-900">Tarifs Abordables</h2>
                    </div>
                </div>

                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                        <div class="flex justify-center">
                            <img src="../src/asset/image3.jpg" class="w-32 h-32 object-cover mb-3 ">
                        </div>
                        <h2 class="title-font font-regular text-2xl text-gray-900">Efficacité et Réactivité</h2>
                    </div>
                </div>

                <div class="p-4 md:w-1/4 sm:w-1/2">
                    <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                        <div class="flex justify-center">
                            <img src="../src/asset/image4.jpg" class="w-32 h-32 object-cover mb-3">
                        </div>
                        <h2 class="title-font font-regular text-2xl text-gray-900">Avocats Spécialisés</h2>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- gallery -->
    <section class="text-gray-700 body-font" id="gallery">
        <div class="flex justify-center text-3xl font-bold text-gray-800 text-center py-10">
            Gallery
        </div>

        <div class="grid grid-cols-1 place-items-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">

            <div class="group relative">
                <img
                    src="../src/asset/gall1.jpg" alt="Image 2"
                    alt="Image 1"
                    class="w-full h-64 object-cover rounded-lg transition-transform transform scale-100 group-hover:scale-105" />
            </div>

            <div class="group relative">
                <img
                    src="../src/asset/gall2.jpg" alt="Image 2"
                    class="w-full h-64 object-cover rounded-lg transition-transform transform scale-100 group-hover:scale-105" />
            </div>

            <div class="group relative">
                <img
                    src="../src/asset/gall3.jpg" alt="Image 3"
                    class="w-full h-64 object-cover rounded-lg transition-transform transform scale-100 group-hover:scale-105" />
            </div>

            <div class="group relative">
                <img src="../src/asset/gall4.jpg"
                    alt="Image 4"
                    class="w-full h-64 object-cover rounded-lg transition-transform transform scale-100 group-hover:scale-105" />
            </div>

        </div>
    </section>


    <!-- Visit us section -->
    <section class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-20 lg:px-8">
            <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900" id="contactUs">Visit Our Location</h2>
                <p class="mt-3 text-lg text-gray-500">Let us serve you the best</p>
            </div>
            <div class="mt-8 lg:mt-20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
        <div class="max-w-full mx-auto rounded-lg overflow-hidden">
        <div class="border-t border-gray-200 px-6 py-4">
            <h3 class="text-lg font-bold text-gray-900">Contact</h3>
            <p class="mt-1 font-bold text-gray-600"><a href="tel:+123">Téléphone : +212677713460</a></p>
            <a class="flex m-1" href="tel:+677713460">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-between h-10 w-30 rounded-md bg-indigo-500 text-white p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        Appelez maintenant
                    </div>
                </div>

            </a>
        </div>
        <div class="px-6 py-4">
            <h3 class="text-lg font-medium text-gray-900">Notre Adresse</h3>
            <p class="mt-1 text-gray-600">,15 ,Ouad El bacha ,Safi</p>
        </div>
        <div class="border-t border-gray-200 px-6 py-4">
            <h3 class="text-lg font-medium text-gray-900">Heures d'ouverture</h3>
            <p class="mt-1 text-gray-600">Lundi - Dimanche : 14h00 - 21h00</p>
        </div>
        </div>
        </div>

                    <div class="rounded-lg overflow-hidden order-none sm:order-first">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3785.7850672491236!2d-9.2355!3d32.2982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b397ff7ff2127f%3A0xd0f8c8182b27b8e9!2z2KfZhdmI2LHZh9iq2YbYp9mG2YfYj9mG!5e0!3m2!1sen!2sin!4v1713433597892"
                            class="w-full" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>


                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <section>
        <footer class="bg-gray-200 text-white py-4 px-3">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full md:w-1/2 md:text-center md:mb-4 mb-8">
                    <p class="text-xs text-gray-400 md:text-sm">Copyright 2024 &copy; All Rights Reserved</p>
                </div>
                <div class="w-full md:w-1/2 md:text-center md:mb-0 mb-8">
                    <ul class="list-reset flex justify-center flex-wrap text-xs md:text-sm gap-3">
                        <li><a href="#contactUs" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li class="mx-4"><a href="/privacy" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </section>

    <script>
        document.getElementById("hamburger").onclick = function toggleMenu() {
            const navToggle = document.getElementsByClassName("toggle");
            for (let i = 0; i < navToggle.length; i++) {
                navToggle.item(i).classList.toggle("hidden");
            }
        };
    </script>
</body>

</html>