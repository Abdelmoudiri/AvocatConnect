<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Avocat</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll(".section-content");
            sections.forEach(section => section.classList.add("hidden"));

            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.classList.remove("hidden");
            }
        }
    </script>

</head>
<body class="bg-gray-100 min-h-screen pt-32">
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <a href="#" class="flex items-center">
                    <img src="../src/asset/logo.jpg" class="h-8 me-3" alt="Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Dashboard Avocat</span>
                </a>
                <button type="button" class="flex text-sm bg-gray-800 rounded-full">
                    <img class="w-8 h-8 rounded-full" src="https://via.placeholder.com/50" alt="User Photo">
                </button>
            </div>
        </div>
    </nav>

    <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="h-full px-3 pb-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li><a href="#" onclick="showSection('profile-section')" class="block p-2 hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a></li>
                <li><a href="#" onclick="showSection('reservations-section')" class="block p-2 hover:bg-gray-100 dark:hover:bg-gray-700">Réservations</a></li>
                <li><a href="#" onclick="showSection('clients-section')" class="block p-2 hover:bg-gray-100 dark:hover:bg-gray-700">Clients</a></li>
                <li><a href="#" onclick="showSection('avocats-section')" class="block p-2 hover:bg-gray-100 dark:hover:bg-gray-700">Avocats</a></li>
                <li><a href="#" onclick="showSection('stats-section')" class="block p-2 hover:bg-gray-100 dark:hover:bg-gray-700">Statistiques</a></li>
            </ul>
        </div>
    </aside>

    <main class="p-4 sm:ml-64">
        <section id="profile-section" class="section-content hidden">
    <h1 class="text-2xl font-semibold mb-4">Profil</h1>
    
    <div class="bg-white p-6 rounded shadow">
        <div class="flex items-center space-x-4">
            <img src="<?php 
                echo !empty($user['image']) ? $user['image'] : 'https://via.placeholder.com/150'; 
            ?>" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
            
            <div>
                <h2 class="text-xl font-bold"><?php echo $user['nom'] . ' ' . $user['prenom']; ?></h2>
                <p class="text-sm text-gray-500">Email: <?php echo $user['email']; ?></p>
                <p class="text-sm text-gray-500">Téléphone: <?php echo $user['phone']; ?></p>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold">Informations complémentaires</h3>
            <p class="text-sm text-gray-500 mt-2">Vous pouvez modifier vos informations personnelles ici.</p>
        </div>

        <div class="mt-6 text-right">
            <button class="px-6 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition duration-300">Modifier Profil</button>
        </div>
    </div>
</section>

<?php
session_start();
$user_id = $_SESSION['user_id']; 

$conn = new mysqli('localhost', 'root', '', 'AvocatConnect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, prenom, email, phone, profile_picture FROM user WHERE id_user = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user found!";
}
$conn->close();
?>



        
            <!-- Reservations Section -->
       
       
            <section id="reservations-section" class="section-content hidden">
    <h1 class="text-2xl font-semibold mb-4">Réservations</h1>
    <p class="mb-4">Gestion des réservations.</p>
    <div class="overflow-x-auto bg-white p-4 rounded shadow">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Nom du Client</th>
                    <th class="px-6 py-3">Nom de l'Avocat</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                $conn = new mysqli('localhost', 'root', '', 'AvocatConnect');

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("Échec de la connexion : " . $conn->connect_error);
                }

                // Requête pour récupérer les réservations
                $sql = "SELECT 
                            r.id_reser, 
                            u.nom AS client_nom, 
                            a.specialite AS avocat_nom, 
                            r.date_res, 
                            r.status 
                        FROM Reservation r
                        JOIN user u ON r.id_client = u.id_user
                        JOIN avocat av ON r.id_avocat = av.id_avocat
                        JOIN user a ON av.id_user = a.id_user";

                $result = $conn->query($sql);

                // Vérifier si des données sont disponibles
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td class='px-6 py-4'>{$row['id_reser']}</td>
                                <td class='px-6 py-4'>{$row['client_nom']}</td>
                                <td class='px-6 py-4'>{$row['avocat_nom']}</td>
                                <td class='px-6 py-4'>{$row['date_res']}</td>
                                <td class='px-6 py-4'>{$row['status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='px-6 py-4 text-center'>Aucune réservation trouvée.</td></tr>";
                }

                // Fermer la connexion
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</section>


        <!-- Clients Section -->
        <section id="clients-section" class="section-content hidden">
            <h1 class="text-2xl font-semibold">Clients</h1>
            <p>Liste des clients<br><br><br><br><br><br><br>hhhh.</p>
        </section>

        <!-- Avocats Section -->
        <section id="avocats-section" class="section-content hidden">
            <h1 class="text-2xl font-semibold">Avocats</h1>
            <p>Gestion des avocats.</p>
        </section>

        <!-- Stats Section -->
        <section id="stats-section" class="section-content hidden">
            <h1 class="text-2xl font-semibold">Statistiques</h1>
            <p>Visualisation des données statistiques.</p>
        </section>
    </main>
</body>
</html>
