<?php
require "./db.php";

$dbc = new DBConnection("uppgift28", "root", "root", "127.0.0.1");

$result = (object) array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["phone_number"])) {
        $firstname = urldecode($_POST["firstname"]);
        $lastname = urldecode($_POST["lastname"]);
        $email = urldecode($_POST["email"]);
        $phone_number = urldecode($_POST["phone_number"]);

        if (strlen($firstname) > 0 && strlen($firstname <= 50)) {
            if (strlen($lastname) > 0 && strlen($lastname <= 50)) {
                if (strlen($email) > 0 && strlen($email <= 255) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if (strlen($phone_number) > 0 && strlen($phone_number) <= 15) {
                        if($dbc->canCreateEntry($firstname, $lastname, $email, $phone_number)) {
                            if($dbc->createEntry($firstname, $lastname, $email, $phone_number)) {
                                $result->success = true;
                            } else {
                                $result->success = false;
                                $result->error = "ERR:FAILED";
                            }
                        } else {
                            $result->success = false;
                            $result->error = "ERR:ALREADY_ENTERED";
                        }
                    } else {
                        $result->success = false;
                        $result->error = "ERR:INVALID_PHONE_NUMBER";
                    }
                } else {
                    $result->success = false;
                    $result->error = "ERR:INVALID_EMAIL";
                }
            } else {
                $result->success = false;
                $result->error = "ERR:INVALID_LASTNAME";
            }
        } else {
            $result->success = false;
            $result->error = "ERR:INVALID_FIRSTNAME";
        }

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
