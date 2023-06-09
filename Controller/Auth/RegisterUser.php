<?php
require_once '../../Model/db/db.class.php';
require_once '../../Model/Auth.php';
$response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DB = new DB();
    $admin = new AuthModel($DB);

    if (
        !empty($_POST['name']) &&
        !empty($_POST['phone_number']) &&
        !empty($_POST['password']) &&
        !empty($_POST['city']) &&
        !empty($_POST['qwater']) &&
        !empty($_POST['gender']) &&
        !empty($_POST['frequency'])
    ) {

        $results = $admin->registerUser(
            $_POST['name'],
            $_POST['phone_number'],
            $_POST['password'],
            $_POST['city'],
            $_POST['qwater'],
            $_POST['gender'],
            $_POST['frequency'],
            $upd_date = date('Y/m/d g:i:s'),
            $upd_date = date('Y/m/d g:i:s')
        );

        if ($results == 1) {
            $response['error'] = false;
            $response['message'] = "User Account Created Successfully";

        } else if ($results == 0) {
            $response['error'] = true;
            $response['message'] = "Something Went Wrong";
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
