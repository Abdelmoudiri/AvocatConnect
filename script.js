const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})


document.getElementById('role').addEventListener('change', function() {
    const role = this.value;
    const avocatFields = document.getElementById('avocatFields');
    if (role === '2') {
        avocatFields.classList.remove('hidden');
    } else {
        avocatFields.classList.add('hidden');
    }
});



// hhhhhhhhhhhhhhhhhhhhhhh
document.addEventListener("DOMContentLoaded", function () {
    function loadPage(page) {
        const content = document.getElementById("content");
        switch (page) {
            case "dashboard":
                content.innerHTML = `
                    <section class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                        <div class="p-4 bg-white rounded shadow">
                            <h2 class="text-lg font-semibold">Réservations</h2>
                            <p class="text-sm text-gray-600">Nombre total : 50</p>
                        </div>
                        <div class="p-4 bg-white rounded shadow">
                            <h2 class="text-lg font-semibold">Clients</h2>
                            <p class="text-sm text-gray-600">Nombre total : 20</p>
                        </div>
                    </section>`;
                break;
            case "reservations":
                content.innerHTML = `
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
                    </section>`;
                break;
            case "clients":
                content.innerHTML = `
                    <section class="mt-6 bg-white rounded shadow">
                        <h2 class="p-4 text-xl font-semibold border-b">Liste des Clients</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3">Nom</th>
                                        <th class="px-6 py-3">Email</th>
                                        <th class="px-6 py-3">Téléphone</th>
                                        <th class="px-6 py-3">Réservations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-6 py-4">John Doe</td>
                                        <td class="px-6 py-4">johndoe@example.com</td>
                                        <td class="px-6 py-4">+212 123 456 789</td>
                                        <td class="px-6 py-4">2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>`;
                break;
            default:
                content.innerHTML = `<p>Page introuvable</p>`;
        }
    }

    // Ajout des gestionnaires d'événements pour les liens
    document.getElementById("dashboard-link").addEventListener("click", function () {
        loadPage("dashboard");
    });

    document.getElementById("reservations-link").addEventListener("click", function () {
        loadPage("reservations");
    });

    document.getElementById("clients-link").addEventListener("click", function () {
        loadPage("clients");
    });

    // Charger la page par défaut
    loadPage("dashboard");
});
