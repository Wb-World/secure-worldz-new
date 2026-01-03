<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// $db_host = "sql204.infinityfree.com";
// $db_user = "if0_40322633";
// $db_pass = "HDm584vG4kZDnt";
// $db_name = "if0_40322633_students";

$db_host = "localhost";
$db_user = "root";
$db_pass = "mypass123";
$db_name = "test";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    echo "connection error";
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $mail = $_POST['mail-login'];
    $passw = $_POST['passw-login'];
    $q = $conn->prepare("SELECT name FROM `users` WHERE email = ? AND passw = ?");
    $q->bind_param("ss",$mail,$passw);
    $q->execute();
    $getres = $q->get_result();

    if($getres->num_rows > 0){
        $datas = $getres->fetch_assoc();
        $_SESSION['current-student'] = $datas['name'];
        echo json_encode(['result' => $datas['name']]);
    } else echo json_encode(['result' => null]);
}
?>