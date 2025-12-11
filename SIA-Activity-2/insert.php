<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $firstname = $_POST['firstname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customer_info (lastname, middlename, firstname, age, gender, contact_no, address)
            VALUES ('$lastname', '$middlename', '$firstname', '$age', '$gender', '$contact_no', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>New customer added successfully!</h2>";
        echo "<a href='add_customer.html'>Add Another</a> | <a href='retrieve.php'>View Customers</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>