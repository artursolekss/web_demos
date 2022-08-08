<?php

class Customer
{
    private string $firstname, $lastname, $phone, $email;

    public function getCustomer(): array
    {
        return [
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "phone" => $this->phone,
            "email" => $this->email
        ];
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function __construct($firstname, $lastname, $phone, $email)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->email = $email;
    }

    public static function selectCustomers(mysqli $con, int $id = null): array
    {
        if ($id === null || $id === 0)
            $query = "SELECT * FROM customer";
        else
            $query = "SELECT * FROM customer WHERE id = $id";

        $result = $con->query($query);
        $customers = [];

        while ($entry = $result->fetch_assoc()) :
            $customer = new Customer($entry["firstname"], $entry["lastname"], $entry["phone"], $entry["email"]);
            array_push($customers, $customer);
        endwhile;

        return $customers;
    }

    // public function createCustomer(mysqli $con)
    // {
    //     $prepStament = $con->prepare("INSERT INTO customer (firstname,lastname,email,phone) VALUES
    //     (?,?,?,?)");
    //     $prepStament->bind_param(
    //         "ssss",
    //         $this->firstname,
    //         $this->lastname,
    //         $this->email,
    //         $this->phone
    //     );
    //     $prepStament->execute();
    // }

    public static function createCustomer(mysqli $con, Customer $customer)
    {
        $prepStament = $con->prepare("INSERT INTO customer (firstname,lastname,email,phone) VALUES
        (?,?,?,?)");
        $prepStament->bind_param(
            "ssss",
            $customer->firstname,
            $customer->lastname,
            $customer->email,
            $customer->phone
        );
        $prepStament->execute();
    }

    public static function insertFromJSONFile(string $filename, mysqli $con)
    {
        $filecontent = file_get_contents($filename);
        $customersObj = json_decode($filecontent);
        foreach ($customersObj->customers as $customer) :
            Customer::createCustomer(
                $con,
                Customer::convertFromJSONToCustomer($customer)
            );
        endforeach;
    }

    public static function convertFromJSONToCustomer($customer): Customer
    {
        return new Customer(
            $customer->firstname,
            $customer->lastname,
            $customer->phone,
            $customer->email
        );
    }

    public function convertToJSON()
    {
        $customer = new stdClass();
        $customer->firstname = $this->firstname;
        $customer->lastname = $this->lastname;
        $customer->phone = $this->phone;
        $customer->email = $this->email;
        return $customer;
    }

    public static function convertCustomerArrToJSON(array $customers): array
    {
        $customersJSON = [];
        foreach ($customers as $customer)
            array_push($customersJSON, $customer->convertToJSON());

        return $customersJSON;
    }

    public static function saveCustomersJSON(string $filename, array $customers)
    {
        $json = json_encode(array("customers" => $customers), JSON_PRETTY_PRINT);
        file_put_contents($filename, $json);
    }

    public function getCustomerRow()
    {
        return "<div class='row'>
                <div class='col'>" . $this->firstname .
            "</div>
                <div class='col'>" . $this->lastname .
            "</div>
                <div class='col'>" . $this->email .
            "</div>
                <div class='col'>" . $this->phone .
            "</div>
            </div>";
    }
}
