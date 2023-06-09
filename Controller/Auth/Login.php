<?php
require_once '../../Model/db/db.class.php';
require_once '../../Model/user.php';
$response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DB = new DB();
    $admin = new UserModel($DB);


    if (!empty($_POST['phone_number']) && !empty($_POST['password']) && !empty($_POST['role'])) {
        $results = $admin->login($_POST['phone_number'], $_POST['password'], $_POST['role']);
        if ($results == 1) {
            $response['error'] = false;
            $response['message'] = "Login Successful";
            session_start();
            $_SESSION['admin'] = ['phone_number' , $_POST['role']];
        } else if ($results == 0) {
            $response['error'] = true;
            $response['message'] = "Wrong Email or Password";
        }
    } else {
        $response['error'] = false;
        $response['message'] = "required fields are missing";
    }
} else {
    $response['error'] = true;
    $response['message'] = "Invalid Request";
}

// echo json_encode($response);
echo @$response['message'];
