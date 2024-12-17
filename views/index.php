<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Avocats</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F8F9F9]">

    <header class="bg-[#2C3E50] text-white py-4 shadow">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="#" class="text-2xl font-bold">AvocatFinder</a>
            <div>
                <button onclick="location.href='login.php'" 
                        class="bg-[#F39C12] text-white px-4 py-2 rounded-md mr-2 hover:bg-orange-500">
                    Se Connecter
                </button>
                <button onclick="location.href='signup.php'" 
                        class="bg-[#F39C12] text-white px-4 py-2 rounded-md hover:bg-orange-500">
                    Créer un Compte
                </button>
            </div>
        </div>
    </header>

    <section class="bg-[#2C3E50] text-white py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Trouvez votre avocat de confiance</h1>
            <p class="text-lg mb-6">Consultez des profils détaillés et choisissez un expert juridique adapté à vos besoins.</p>
        </div>
    </section>

    <section class="container mx-auto my-8 px-6">
        <h2 class="text-3xl font-bold text-[#2C3E50] text-center mb-8">Nos Avocats</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            
            <div class="bg-white shadow rounded-lg p-6">
                <img src="https://via.placeholder.com/150" alt="Photo de l'avocat" class="rounded-full mx-auto mb-4 w-32 h-32 border-[#2C3E50] border-4">
                <h3 class="text-lg font-bold text-center text-[#2C3E50]">Me. John Doe</h3>
                <p class="text-sm text-[#7F8C8D] text-center">Spécialités : Divorce, Contrats</p>
                <p class="text-sm text-[#7F8C8D] text-center">Expérience : 10 ans</p>
                <div class="mt-4 text-center">
                    <button onclick="location.href='login.html'" 
                            class="bg-[#2C3E50] text-white px-4 py-2 rounded-md hover:bg-blue-800">
                        Voir Profil
                    </button>
                </div>
            </div>

            
            <div class="bg-white shadow rounded-lg p-6">
                <img src="https://via.placeholder.com/150" alt="Photo de l'avocat" class="rounded-full mx-auto mb-4 w-32 h-32 border-[#2C3E50] border-4">
                <h3 class="text-lg font-bold text-center text-[#2C3E50]">Me. Jane Smith</h3>
                <p class="text-sm text-[#7F8C8D] text-center">Spécialités : Droit Pénal, Fiscalité</p>
                <p class="text-sm text-[#7F8C8D] text-center">Expérience : 8 ans</p>
                <div class="mt-4 text-center">
                    <button onclick="location.href='login.html'" 
                            class="bg-[#2C3E50] text-white px-4 py-2 rounded-md hover:bg-blue-800">
                        Voir Profil
                    </button>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <img src="https://via.placeholder.com/150" alt="Photo de l'avocat" class="rounded-full mx-auto mb-4 w-32 h-32 border-[#2C3E50] border-4">
                <h3 class="text-lg font-bold text-center text-[#2C3E50]">Me. Sarah Lee</h3>
                <p class="text-sm text-[#7F8C8D] text-center">Spécialités : Droit Immobilier, Propriété Intellectuelle</p>
                <p class="text-sm text-[#7F8C8D] text-center">Expérience : 12 ans</p>
                <div class="mt-4 text-center">
                    <button onclick="location.href='login.html'" 
                            class="bg-[#2C3E50] text-white px-4 py-2 rounded-md hover:bg-blue-800">
                        Voir Profil
                    </button>
                </div>
            </div>

        </div>
    </section>


    <footer class="bg-[#2C3E50] text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 AvocatFinder. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
