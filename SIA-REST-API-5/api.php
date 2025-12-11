<?php 
include 'db.php'; 
 
header("Content-Type: application/json"); 
 
$method = $_SERVER['REQUEST_METHOD']; 
$input = json_decode(file_get_contents('php://input'), true); 
 
switch ($method) { 
    case 'GET': 
        if (isset($_GET['id'])) { 
            $id = $_GET['id']; 
            $result = $conn->query("SELECT * FROM products WHERE id=$id"); 
            $data = $result->fetch_assoc(); 
            echo json_encode($data); 
        } else { 
            $result = $conn->query("SELECT * FROM products"); 
            $users = []; 
            while ($row = $result->fetch_assoc()) { 
                $users[] = $row; 
            } 
            echo json_encode($users); 
        } 
        break; 
 
    case 'POST': 
        $customer = $input['customer']; 
        $product_name = $input['product_name']; 
        $price = $input['price']; 
        $qty = $input['qty']; 
 
        $conn->query("INSERT INTO products (customer, product_name, price, qty) VALUES ('$customer','$product_name', $price, $qty)"); 
        echo json_encode(["message" => "User added successfully"]); 
        break; 
 
    case 'PUT': 
        $id = $_GET['id']; 
        $customer = $input['customer']; 
        $product_name = $input['product_name']; 
        $price = $input['price']; 
        $qty = $input['qty']; 
 
        $conn->query("UPDATE products SET customer='$customer', 
                     product_name='$product_name', price=$price, qty = $qty WHERE id=$id"); 
        echo json_encode(["message" => "User updated successfully"]); 
        break; 
 
    case 'DELETE': 
        $id = $_GET['id']; 
        $conn->query("DELETE FROM products WHERE id=$id"); 
        echo json_encode(["message" => "User deleted successfully"]); 
        break; 
 
    default: 
        echo json_encode(["message" => "Invalid request method"]); 
        break; 
} 
 
$conn->close(); 
?>