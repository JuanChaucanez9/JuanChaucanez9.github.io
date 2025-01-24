<?php
session_start();
$response = array('loggedIn' => false);

if (isset($_SESSION['usuario'])) {
    $response['loggedIn'] = true;
    $response['usuario'] = $_SESSION['usuario'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>