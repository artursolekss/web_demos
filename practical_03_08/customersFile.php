<?php
include("utils.php");
$err = "";
$con = connectToDB($err);
if ($err === "")
    $customers = selectCustomers($con);
else
    echo $err;

if (isset($_POST["xmlFilePath"]))
    saveCustomersToXML($_POST["xmlFilePath"], $customers);

if ($err === "")
    $customers = selectCustomers($con);
else
    echo $err;

?>

<head>
    <?php include("header.php") ?>
</head>

<body>
    <div class="container">
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
        <?php while ($entry = $customers->fetch_assoc()) : ?>
            <div class="row">
                <div class="col">
                    <?= $entry["firstname"] ?>
                </div>
                <div class="col">
                    <?= $entry["lastname"] ?>
                </div>
                <div class="col">
                    <?= $entry["email"] ?>
                </div>
                <div class="col">
                    <?= $entry["phone"] ?>
                </div>
            </div>
        <?php endwhile; ?>
        <form method="POST">
            <input value=".xml" name="xmlFilePath">
            <button class="btn">Save to XML</button>
        </form>
    </div>
</body>