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

function createUser($uname, $password)
{
    $con = connectToDB();
    $prepStament = $con->prepare("INSERT INTO users (username,`password`) VALUES
    (?,?)");
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $prepStament->bind_param("ss", $uname, $passwordHash);
    $prepStament->execute();
}

$newUser = json_decode(file_get_contents('php://input'));

createUser($newUser->username, $newUser->password);

$response = (object) array("userCreated" => true, "username" => $newUser->username);

echo json_encode($response);
