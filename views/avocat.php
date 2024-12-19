

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Avocat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <a href="#" class="flex ms-2">
                    <img src="../src/asset/logo.jpg" class="h-8 me-3" alt="Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Avocat :</span>
                </a>
            </div>
            <div class="flex items-center">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <img class="w-8 h-8 rounded-full" src="https://via.placeholder.com/50" alt="user photo">
                </button>
            </div>
        </div>
    </div>
</nav>

<aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="h-full px-3 pb-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a  id="dashboard-link" href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"></svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a  id="reservations-link" href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"></svg>
                    <span class="ms-3">Réservations</span>
                </a>
            </li>
            <li>
                <a id="clients-link" href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"></svg>
                    <span class="ms-3">Clients</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"></svg>
                    <span class="ms-3">Statistiques</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<main class="p-4 sm:ml-64">
    <section class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-lg font-semibold">Réservations</h2>
            <p class="text-sm text-gray-600">Nombre total : 50</p>
        </div>
        <div class="p-4 bg-white rounded shadow">
            <h2 class="text-lg font-semibold">Clients</h2>
            <p class="text-sm text-gray-600">Nombre total : 20</p>
        </div>
    </section>
    
    <section class="mt-6 bg-white rounded shadow">
        <h2 class="p-4 text-xl font-semibold border-b">Liste des Réservations</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nom Client</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Statut</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">John Doe</td>
                        <td class="px-6 py-4">2024-12-19</td>
                        <td class="px-6 py-4">Confirmée</td>
                        <td class="px-6 py-4"><button class="text-blue-600">Modifier</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
<script src="../script.js"></script>

</body>
</html>
