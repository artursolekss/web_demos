<?php
include("../utils.php");
include("customer.php");
$err = "";
$con = Utilities::connectToDB($err);
$customers;
if ($err === "")
    $customers = Customer::selectCustomers($con);
else
    echo $err;

if (isset($_POST["insertFromJSFileName"]))
    Customer::insertFromJSONFile($_POST["insertFromJSFileName"], $con);

if (isset($_POST["jsonFilePath"]))
    Customer::saveCustomersJSON(
        $_POST["jsonFilePath"],
        Customer::convertCustomerArrToJSON($customers)
    );

?>

<head>
    <?php include("header.php") ?>
</head>

<body>
    <div class="container">
        <form method="POST">
            <input type="file" name="insertFromJSFileName">
            <button class="btn">Insert from JSON file</button>
        </form>
        <b>
            <div class="row">
                <div class="col">
                    First name
                </div>
                <div class="col">
                    Last name
                </div>
                <div class="col">
                    E-Mail
                </div>
                <div class="col">
                    Phone
                </div>
            </div>
        </b>
        <?php foreach ($customers as $customer) :
            echo ($customer->getCustomerRow());
        endforeach; ?>
        <form method="POST">
            <input value=".json" name="jsonFilePath">
            <button class="btn">Save to JSON</button>
        </form>
    </div>
</body>