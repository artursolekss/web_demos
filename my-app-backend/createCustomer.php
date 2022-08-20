<?php
include("customer.php");

$customerInput = json_decode(file_get_contents('php://input'));
$customerInput->id = null;
$customerObj = Customer::convertFromJSONToCustomer($customerInput);
Customer::createCustomer($customerObj);
echo "The customer is created sucessfully";