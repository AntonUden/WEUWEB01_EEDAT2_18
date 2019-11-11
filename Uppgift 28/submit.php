<?php
    require "./db.php";

    $dbc = new DBConnection("uppgift28", "root", "root", "127.0.0.1");

    $result = (object)array();

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_GET["firstname"]) && isset($_GET["lastname"]) && isset($_GET["email"]) && isset($_GET["phone_number"])) {
            $firstname = $_GET["firstname"];
            $lastname = $_GET["lastname"];
            $email = $_GET["email"];
            $phone_number = $_GET["phone_number"];
        } else {
            http_response_code(400);
            $result->success = false;
            $result->error = "ERR:BAD_REQUEST";
        }
    } else {
        http_response_code(400);
        $result->success = false;
        $result->error = "ERR:BAD_REQUEST";
    }

    header('Content-Type: application/json; charset=utf-8');
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	echo json_encode($result);
?>