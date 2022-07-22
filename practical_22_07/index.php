<?php
// if (isset($_POST["myInput"])) {
//     echo ("Your input was : " . $_POST["myInput"]);
// }
?>

<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>Enter the customer:</h1>
        <!-- <form method="POST" action="addCustomer.php">
            <label for="Firstname">First Name:</label><input id="Firstname" name="FirstName">
            <label for="Lastname">Last Name:</label><input id="Lastname" name="LastName">
            <label for="EMail">E-Mail:</label><input id="EMail" name="EMail">
            <label for="Phone">Phone number:</label><input id="Phone" name="phone" type="number">
            <button>Save</button>
        </form> -->

        <form method="POST" action="addCustomer.php">
            <div class="form-group">
                <label for="exampleInputFirstName1">First Name</label>
                <input name="FirstName" type="text" class="form-control" id="exampleInputFirstName1" aria-describedby="firstnameHelp" placeholder="Enter first name">
                <small id="firstnameHelp" class="form-text text-muted">Enter First Name</small>
            </div>
            <div class="form-group">
                <label for="exampleInputLastName1">Last Name</label>
                <input name="LastName" type="text" class="form-control" id="exampleInputLastName1" aria-describedby="lastnameHelp" placeholder="Enter last name">
                <small id="lastnameHelp" class="form-text text-muted">Enter Last Name</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="EMail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPhone1">Phone</label>
                <input type="number" class="form-control" id="exampleInputPhone1" name="phone" placeholder="Phone">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>

</html>