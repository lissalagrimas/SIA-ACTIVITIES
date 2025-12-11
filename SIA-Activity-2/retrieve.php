<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Retrieve Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>LIST OF CUSTOMERS REGISTERED</h2>
    <a href="index.html" class="home-link">HOME</a> |
    <a href="add_customer.html" class="home-link">ADD CUSTOMER</a>

    <h3>Customer Information</h3>
    <table>
        <tr>
            <th>CUSTOMER ID</th>
            <th>LAST NAME</th>
            <th>MIDDLE NAME</th>
            <th>FIRST NAME</th>
            <th>AGE</th>
            <th>GENDER</th>
            <th>CONTACT NO</th>
            <th>ADDRESS</th>
        </tr>

        <?php
        $sql = "SELECT * FROM customer_info";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['middlename']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['contact_no']}</td>
                        <td>{$row['address']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No customers found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>