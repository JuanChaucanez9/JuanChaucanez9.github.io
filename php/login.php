<?php
include 'db.php';

$response = array('success' => false, 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Iniciar sesión exitosa
            session_start();
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['email'] = $user['email'];
            $response['success'] = true;
        } else {
            $response['message'] = "Contraseña incorrecta.";
        }
    } else {
        $response['message'] = "No se encontró una cuenta con ese correo electrónico.";
    }

    $stmt->close();
    $conn->close();
}

header('Content-Type: application/json');
echo json_encode($response);
?>