<?php
include("customer.php");
include("utils.php");
$con = connectToDB();
if ($con !== null) :
    $customers = Customer::convertCustomersToTextArray(
        Customer::selectCustomers($con));
    echo json_encode($customers);
endif;
