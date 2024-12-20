<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database connection
    include 'conn.php';

    // SQL query to fetch data from both `user` and `avocat` tables
    $sql = "
        SELECT 
            user.nom, 
            user.prenom, 
            user.age, 
            user.email, 
            user.phone, 
            user.image, 
            avocat.specialite, 
            avocat.annee_exp, 
            avocat.bio 
        FROM 
        user 
        JOIN avocat 
        WHERE user.id_user = avocat.id_user 
         
        and avocat.id_avocat = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the ID parameter
        $stmt->bind_param('i', $id);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the user and avocat data
        if ($data = $result->fetch_assoc()) {
            $nom = htmlspecialchars($data['nom'], ENT_QUOTES, 'UTF-8');
            $prenom = htmlspecialchars($data['prenom'], ENT_QUOTES, 'UTF-8');
            $age = htmlspecialchars($data['age'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8');
            $phone = htmlspecialchars($data['phone'], ENT_QUOTES, 'UTF-8');
            $image = htmlspecialchars($data['image'], ENT_QUOTES, 'UTF-8');
            $specialite = htmlspecialchars($data['specialite'], ENT_QUOTES, 'UTF-8');
            $annee_exp = htmlspecialchars($data['annee_exp'], ENT_QUOTES, 'UTF-8');
            $bio = htmlspecialchars($data['bio'], ENT_QUOTES, 'UTF-8');
        } else {
            echo "No avocat found with this ID.";
            exit;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "No ID found in the URL.";
    exit;
}
?>
<!-- dddddddddddd -->
                <!-- <p><strong>Speciality:</strong> <?= $specialite ?></p>
                <p><strong>Experience:</strong> <?= $annee_exp ?></p>
                <p><strong>Email:</strong> <?= $email ?></p>
                <p><strong>Phone:</strong> <?= $phone ?></p>
                <p><strong>Age:</strong> <?= $age ?></p> -->
      <!-- hhhhhhhhhhhhh -->

 <!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Avocat Profile - Achraf Abdeslami</title>
  <!-- Tailwind CSS CDN with Dark Mode Configuration -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Configure Tailwind to use class-based dark mode
    tailwind.config = {
      darkMode: 'class', // Enable class-based dark mode
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
        },
      },
    }
  </script>
  <!-- Optional: Include Font Awesome for Icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class=" bg-white text-white font-poppins transition-colors duration-300">
  <div class="min-h-screen flex flex-col">
    <!-- Header Section -->
    <header class="bg-white dark:bg-gray-800 shadow-md">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-indigo-500 text-2xl font-semibold">Achraf Abdeslami, Avocat</div>
        
        <!-- Navigation -->
        

        <!-- Dark Mode Toggle -->
        <div class="ml-4">
          <button id="theme-toggle" class="text-indigo-500 focus:outline-none">
            <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
            <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 3a1 1 0 011 1v1a1 1 0 11-2 0V4a1 1 0 011-1zm4.22 1.22a1 1 0 011.415 1.415l-.707.707a1 1 0 11-1.414-1.414l.707-.708zM17 10a1 1 0 100 2h1a1 1 0 100-2h-1zm-1.22 4.78a1 1 0 011.415-1.415l.707.708a1 1 0 11-1.414 1.414l-.708-.707zM10 17a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.78-1.22a1 1 000-1.415l.707.708a1 1 0 001.414-1.414l-.707-.709zM3 10a1 1 0 100 2H2a1 1 0 100-2h1zm1.22-4.78a1 1 0 00-1.415-1.415l-.708.707a1 1 0 001.414 1.414l.709-.708zM10 7a3 3 0 100 6 3 3 0 000-6z"/>
            </svg>
          </button>
        </div>
      </div>
    </header>
   
    <!-- Hero Section -->
    <section id="home" class="flex-1 flex flex-col-reverse md:flex-row items-center justify-between px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <div class="md:w-1/2">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-semibold dark:text-white text-black mb-4">Hello, I’m <h2 class="text-3xl sm:text-4xl md:text-5xl font-semibold"><?= $nom . ' ' . $prenom ?></h2>, </h1>
        
        <p class="text-lg sm:text-xl md:text-2xl font-medium dark:text-gray-300 text-gray-600">
        <strong>Bio:</strong> <?= $bio ?>
        </p>
      </div>
      <div class="md:w-1/2 flex justify-center mb-6 md:mb-0">
        <img src="../uploads/<?= $image ?>" alt="Profile Picture" class="w-64 h-64 sm:w-80 sm:h-80 rounded-full bg-indigo-500 object-cover">
      </div>
    </section>
   
    <!-- About Me Section -->
    <section id="about" class="px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <h2 class="text-indigo-500 text-3xl sm:text-4xl font-semibold mb-6 ">About Me</h2>
      <p class="text-lg sm:text-xl font-medium dark:text-white text-black">
        My name is Achraf Abdeslami, and I am an experienced Avocat based in Safi, specializing in criminal law, family law, and corporate law. With over a decade of experience, I have successfully represented individuals and businesses, offering expert legal advice and advocacy in court.
      </p>
    </section>

    <!-- Services Section -->
    <section id="services" class="px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <h2 class="text-indigo-500 text-3xl sm:text-4xl font-semibold mb-6">Legal Services I Offer</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Service 1 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col items-center text-center">
          <i class="fas fa-gavel text-indigo-500 text-3xl mb-4"></i>
          <h3 class="text-black dark:text-white text-2xl font-semibold mb-2">Criminal Defense</h3>
          <p class="text-black dark:text-white text-base">Defending individuals accused of crimes with a focus on securing the best possible outcome.</p>
        </div>
        <!-- Service 2 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col items-center text-center">
          <i class="fas fa-users text-indigo-500 text-3xl mb-4"></i>
          <h3 class="text-black dark:text-white text-2xl font-semibold mb-2">Family Law</h3>
          <p class="text-black dark:text-white text-base">Providing legal assistance for family-related issues, including divorce, child custody, and more.</p>
        </div>
        <!-- Service 3 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col items-center text-center">
          <i class="fas fa-briefcase text-indigo-500 text-3xl mb-4"></i>
          <h3 class="text-black dark:text-white text-2xl font-semibold mb-2">Corporate Law</h3>
          <p class="text-black dark:text-white text-base">Expert legal services for businesses, including contract drafting, mergers, acquisitions, and more.</p>
        </div>
        <!-- Service 4 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col items-center text-center">
          <i class="fas fa-balance-scale text-indigo-500 text-3xl mb-4"></i>
          <h3 class="text-black dark:text-white text-2xl font-semibold mb-2">Civil Litigation</h3>
          <p class="text-black dark:text-white text-base">Handling legal disputes in civil matters, including contract disputes and personal injury claims.</p>
        </div>
      </div>
    </section>

    <!-- Cases Section -->
    <section id="cases" class="px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <h2 class="text-indigo-500 text-3xl sm:text-4xl font-semibold mb-6">Notable Cases</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Case 1 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col">
          <h3 class="text-indigo-500 text-2xl font-semibold mb-2">Case 1: Criminal Defense</h3>
          <p class="text-black dark:text-white text-lg flex-grow">Successfully defended a client in a high-profile criminal case, resulting in acquittal.</p>
        </div>
        <!-- Case 2 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col">
          <h3 class="text-indigo-500 text-2xl font-semibold mb-2">Case 2: Family Law</h3>
          <p class="text-black dark:text-white text-lg flex-grow">Handled a complex custody case with a favorable outcome for the client.</p>
        </div>
        <!-- Case 3 -->
        <div class="bg-gray-100 dark:bg-gray-600 rounded-lg p-6 flex flex-col">
          <h3 class="text-indigo-500 text-2xl font-semibold mb-2">Case 3: Corporate Law</h3>
          <p class="text-black dark:text-white text-lg flex-grow">Successfully negotiated a merger for a local business, resulting in growth and expansion.</p>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="px-6 sm:px-10 md:px-16 py-12 bg-white dark:bg-gray-800">
      <h2 class="text-indigo-500 text-3xl sm:text-4xl font-semibold mb-6">Contact Me</h2>
      <p class="text-lg sm:text-xl font-medium dark:text-white text-black mb-6">If you need legal assistance, don't hesitate to reach out. I’m available for consultations.</p>
      <form action="#" method="POST">
        <input type="text" name="name" placeholder="Your Name" class="w-full sm:w-1/2 py-3 px-6 border border-gray-300 dark:bg-gray-600 dark:border-gray-500 dark:text-white rounded-md mb-4">
        <input type="email" name="email" placeholder="Your Email" class="w-full sm:w-1/2 py-3 px-6 border border-gray-300 dark:bg-gray-600 dark:border-gray-500 dark:text-white rounded-md mb-4">
        <textarea name="message" placeholder="Your Message" class="w-full sm:w-1/2 py-3 px-6 border border-gray-300 dark:bg-gray-600 dark:border-gray-500 dark:text-white rounded-md mb-4"></textarea>
        <button type="submit" class="bg-indigo-500 text-white py-3 px-6 rounded-md">Send Message</button>
      </form>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 text-center">
      <p>&copy; 2024 Achraf Abdeslami. All Rights Reserved.</p>
    </footer>
  </div>
</body>
</html>
