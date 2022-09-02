<?php

function connectToDB(string &$err = null)
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "js_06_02";

    $con = new mysqli($hostname, $username, $password, $databasename);
    if ($con->connect_error) {
        $err = $con->connect_error;
    }

    return $con;
}

function checkExist($uname, $password): bool
{
    $con = connectToDB();
    $prepStament = $con->prepare("SELECT `password` FROM users WHERE
    username = ?");
    $prepStament->bind_param("s", $uname);
    $prepStament->execute();
    $result = $prepStament->get_result();
    $passwordDB = $result->fetch_assoc()["password"];
    if (password_verify($password, $passwordDB))
        return true;
    else
        return false;
}

$newUser = json_decode(file_get_contents('php://input'));

$userExist = checkExist($newUser->username, $newUser->password);

$response = (object) array("userexist" => $userExist);

echo json_encode($response);
