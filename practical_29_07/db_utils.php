<?php

function connectToDB(string &$err)
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "js_06_02";

    $con = new mysqli($hostname, $username, $password, $databasename);
    if ($con->connect_error) {
        $err = $con->connect_error;
    }
    // $err = "We have the error";

    return $con;
}

function selectCustomers(mysqli $con, int $id = null): mysqli_result
{
    if ($id === null)
        $query = "SELECT * FROM customer";
    else
        $query = "SELECT * FROM customer WHERE id = $id";
    return $con->query($query);
}


function updateCustomer(
    mysqli $con,
    int $id,
    string $firstname,
    string $lastname,
    string $email,
    string $phone
) {

    $query = "UPDATE customer SET firstname='$firstname',lastname='$lastname',email='$email',
    phone='$phone' WHERE id=$id";
    $con->query($query);
}
