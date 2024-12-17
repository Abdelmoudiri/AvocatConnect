<?php
include 'connect.php';

if (isset($_POST['signUp'])) {

    $role = trim($_POST['role']);
    $prenom = trim($_POST['lName']);
    $nom = trim($_POST['fName']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $password = trim($_POST['password']);
    $image =$_POST['photo'];
    $image =$_POST['age'];
    $experience =trim($_POST['experience']);
    $specialites =trim($_POST['specialites']);
    $biographie =trim($_POST['biographie']);


    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


    $stmt = $conn->prepare("SELECT * FROM membres WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email Address Already Exists!');</script>";
    } else {

        $insertQuery = $conn->prepare("INSERT INTO user (nom, prenom, age, email, password, phone,image, id_role) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
        $insertQuery->bind_param("ssissssi", $nom, $prenom, $age,$email, $password,$telefone,$image,$role);
        if ($insertQuery->execute()) {
            echo "<script>alert('Registration Successful! Redirecting to login...');</script>";
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
        $insertQuery->close();
    }
    $stmt->close();
}

if (isset($_POST['signIn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['passwordIN']);

    $stmt = $conn->prepare("SELECT * FROM membres WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if ($password=== $row['password']) {
            session_start();
            $_SESSION['user_id'] = $row['ID_Membre'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id_role'] = $row['id_role'] ?? 0;

            if ($_SESSION['id_role'] == 1) {
                header("Location: client.php");
            } else {
                header("Location: avocat.php");
    
            }
            exit();
        } else {
        
            echo "
            <script>
                
                if(alert('Incorrect Password!')){
                    console.log('alert PW');
                }
            </script>
            ";
        }
    } else {
        echo "
            <script>
                
                window.location.href = 'index.php';
                document.getElementById('message').innerHtml = 'Email Incorrect !';

                
            </script>
            ";

    }
    $stmt->close();
}
?>
