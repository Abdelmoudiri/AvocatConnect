<?php
include 'conn.php';
if (isset($_POST['signUp'])) {
    $role = $_POST['role'];
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $phone = $_POST['telefone'];
    $password = $_POST['password'];
    $hashpassword = password_hash($password, PASSWORD_BCRYPT);

    
        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];

        $newfilename =uniqid()."-".$filename;

        move_uploaded_file($tempname,'../uploads/'.$newfilename);    

    $stmt = $conn->prepare("INSERT INTO user (nom, prenom, email, password, phone, image, id_role) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $lastName, $firstName, $email, $hashpassword, $phone, $newfilename, $role);

    if ($stmt->execute()) {
        $id_user = $conn->insert_id;
        if ($role == 2) {
            $specialites = isset($_POST['specialites']) ? $_POST['specialites'] : null;
            $experience = isset($_POST['experience']) ? $_POST['experience'] : null;
            $biographie = isset($_POST['biographie']) ? $_POST['biographie'] : null;
            $stmt = $conn->prepare("INSERT INTO avocat (specialite, annee_exp, bio, id_user) 
                                    VALUES (?, DATE_SUB(CURDATE(), INTERVAL ? YEAR), ?, ?)");
            $stmt->bind_param("sssi", $specialites, $experience, $biographie, $id_user);
            $stmt->execute();
        }
        
        echo "Inscription réussie.";
        header('Location: login.php');
        exit;  
    } else {
        echo "Erreur lors de l'inscription : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen flex items-center justify-center p-4">

    <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-lg w-full">
<div id="signup" class="p-6 hidden">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Create Account</h1>
    <form method="post" action="login.php" enctype="multipart/form-data">
        <div class="mb-4 relative">
            <label for="role" class="block text-gray-700 font-medium">Role</label>
            <select name="role" id="role" required 
                class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
                <option value="1">Client</option>
                <option value="2">Avocat</option>
            </select>
        </div>

        <div class="mb-4 relative">
            <label for="fName" class="block text-gray-700 font-medium">First Name</label>
            <input type="text" name="fName" id="fName" placeholder="First Name" required 
                class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
        </div>
        <div class="mb-4 relative">
            <label for="lName" class="block text-gray-700 font-medium">Last Name</label>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required 
                class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
        </div>
        <div class="mb-4 relative">
            <label for="email" class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required 
                class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
        </div>
        <div class="mb-4 relative">
            <label for="telefone" class="block text-gray-700 font-medium">Phone</label>
            <input type="text" name="telefone" id="telefone" placeholder="Phone" required 
                class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
        </div>
        <div class="mb-6 relative">
            <label for="password" class="block text-gray-700 font-medium">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required 
                class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
        </div>
        <div class="mb-4 relative">
            <label for="photo" class="block text-gray-700 font-medium">Profile Photo</label>
            <input type="file" name="image"
                class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
        </div>

        <div id="avocatFields" class="hidden">
            <div class="mb-4 relative">
                <label for="specialites" class="block text-gray-700 font-medium">Specialties</label>
                <textarea name="specialites" id="specialites" placeholder="Specialties (e.g., Divorce, Contracts)" 
                    class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded"></textarea>
            </div>
            <div class="mb-4 relative">
                <label for="experience" class="block text-gray-700 font-medium">Experience (Years)</label>
                <input type="number" name="experience" id="experience" placeholder="Experience" 
                    class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
            </div>
            <div class="mb-4 relative">
                <label for="biographie" class="block text-gray-700 font-medium">Biography</label>
                <textarea name="biographie" id="biographie" placeholder="Short Biography" 
                    class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded"></textarea>
            </div>
        </div>

        <input type="submit" value="Sign Up" name="signUp" 
            class="w-full bg-blue-500 text-white py-2 rounded-md font-medium hover:bg-blue-600 transition duration-300">
    </form>

    <p class="text-center my-6 text-gray-600">Already have an account? 
        <button id="signInButton" class="text-blue-500 hover:underline">Sign In</button>
    </p>
</div>

        <div id="signIn" class="p-6">
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Welcome Back</h1>
            <form method="post" action="login.php" >
                <div class="mb-4 relative">
                    <label for="emailLogin" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" id="emailLogin" placeholder="Email" required 
                        class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
                </div>
                <div class="mb-6 relative">
                    <label for="passwordLogin" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" name="passwordIN" id="passwordLogin" placeholder="Password" required 
                        class="w-full border border-gray-300 focus:ring focus:ring-blue-200 focus:outline-none py-2 px-4 rounded">
                </div>
                <p class="text-right text-blue-500 text-sm mb-4">
                    <a href="#" class="hover:underline">Forgot Password?</a>
                </p>
                
                <input type="submit" value="Sign In" name="signIn" 
                    class="w-full bg-blue-500 text-white py-2 rounded-md font-medium hover:bg-blue-600 transition duration-300">
            </form>
            <p class="text-center my-6 text-gray-600">Don't have an account? 
                <button id="signUpButton" class="text-blue-500 hover:underline">Sign Up</button>
            </p>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="../script.js?v=<?php echo time(); ?>"></script>
</body>
</html>
